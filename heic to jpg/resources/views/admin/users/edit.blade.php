@extends('admin.layout.app')

@section('title','Edit User')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Edit User</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <a href="{{ route('users.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit User</h4>
        <form method="POST" action="{{ route('users.update', $user->id) }}" class="user" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('admin.users.form')
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var _token = $("input[name='_token']").val();
    var id = {{ $user->id }};
    $(".user").validate({
        errorClass: "text-danger",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
            $(element).parent().addClass('has-danger');
            $(element).addClass('form-control-danger');
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
            $(element).parent().removeClass('has-danger');
            $(element).removeClass('form-control-danger');
            $(element).parent().addClass('has-success');
            $(element).addClass('form-control-success');
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element)
        },
        rules:{
            password: {
                minlength:8,
                maxlength:15
            },    
            confirm_password:{
                equalTo: "#password"
            },
            email:{
                "remote":
                {
                    url: "{{ route('user.checkEmail') }}",
                    type: "POST",
                    data: {
                        _token:_token,
                        id:id,
                        email: function() {
                            return $("input[name='email']").val();
                        }
                    },
                }
            }
        },
        messages:{
            email:{
                required: "Please enter a valid email address.",
                remote: jQuery.validator.format("{0} is already exist.")
            }
        }
    });
</script>
@endsection