@extends('admin.layout.app')

@section('title','Create Dynamic String')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Create Dynamic String</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dynamic-strings.index') }}">Dynamic String</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <a href="{{ route('dynamic-strings.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Create String</h4>
        <form method="POST" action="{{ route('dynamic-strings.store') }}" role="form" enctype="multipart/form-data" class="string">
            @csrf
            @include('admin.string.form')
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var _token = $("input[name='_token']").val();
    $(".string").validate({
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
            key:{
                "remote":
                {
                    url: "{{ route('string.check_key') }}",
                    type: "POST",
                    data: {
                        _token:_token,
                        language_id:function() {
                            return $("input[name='language_id']").val();
                        },
                        key: function() {
                            return $("input[name='key']").val();
                        }
                    },
                }
            }
        },
        messages:{
            key:{
                required: "Please enter a unique key.",
                remote: jQuery.validator.format("Key {0} is already exist.")
            }
        }
    });
</script>
@endsection