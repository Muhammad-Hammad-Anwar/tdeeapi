@extends('admin.layout.app')

@section('title','Profile')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Profile</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="{{ asset(Auth::user()->image) }}" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
                    <h6 class="card-subtitle">{{ Auth::user()->email }}</h6>
                </center>
            </div>
        </div>
    </div>
    <div class="col-lg-8 ">
        <div class="card p-5">
        <h4 class="card-title m-t-10">Edit Profile</h4>
            <form method="POST" action="{{ route('user.profile.update') }}" class="profile" role="form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <div class="row">
                    <div class="form-group col-lg-6">
                        {{ Form::label('name') }}
                        {{ Form::text('name', Auth::user()->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group col-lg-6">
                        {{ Form::label('email') }}
                        {{ Form::text('email', Auth::user()->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email','required']) }}
                        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group col-lg-6">
                        {{ Form::label('Old password') }}
                        {{ Form::password('old_password',  ['class' => 'form-control' . ($errors->has('old_password') ? ' is-invalid' : ''), 'placeholder' => 'Old Password','id' => 'old_password']) }}
                        {!! $errors->first('old_password', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group col-lg-6">
                        {{ Form::label('New password') }}
                        {{ Form::password('new_password', ['class' => 'form-control' . ($errors->has('new_password') ? ' is-invalid' : ''), 'placeholder' => 'New Password','id'=>'new_password']) }}
                        {!! $errors->first('new_password', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group col-lg-6">
                        {{ Form::label('Confirm password') }}
                        {{ Form::password('confirm_password', ['class' => 'form-control' . ($errors->has('confirm_password') ? ' is-invalid' : ''), 'placeholder' => 'Confirm Password']) }}
                        {!! $errors->first('confirm_password', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group col-lg-6">
                        {{ Form::label('image') }}
                        {{ Form::file('image', ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'accept' => 'image/png,image/jpg,image/jpeg']) }}
                        {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="box-footer mt20">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var _token = $("input[name='_token']").val();
    var password = $('#new_password');
    var oldpassword = $('#old_password');
    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than 1 MB');
    $(".profile").validate({
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
            image: {filesize  : 1000000},
            new_password: {
                required: function(){if (oldpassword.val().length != 0) {return true}else{return false}},
                minlength:8,
                maxlength:15
            },    
            confirm_password:{
                required: function(){if (password.val().length != 0) {return true}else{return false}}, 
                equalTo: "#new_password"
            },
            email:{
                "remote":
                {
                    url: "{{ route('user.checkEmail') }}",
                    type: "POST",
                    data: {
                        _token:_token,
                        id: function() {
                            return $("input[name='id']").val();
                        },
                        email: function() {
                            return $("input[name='email']").val();
                        }
                    },
                }
            },
            old_password:{
                "remote":
                {
                    url: "{{ route('user.checkPassword') }}",
                    type: "POST",
                    data: {
                        _token:_token,
                        id: function() {
                            return $("input[name='id']").val();
                        },
                        old_password: function() {
                            return $("input[name='old_password']").val();
                        }
                    },
                }
            }
        },
        messages:{
            email:{
                required: "Please enter a valid email address.",
                remote: jQuery.validator.format("{0} is already exist.")
            },
            old_password:{
                remote: jQuery.validator.format("Old password {0} is incorrect.")
            }
        }
    });
</script>
@endsection