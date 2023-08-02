@extends('admin.layout.app')

@section('title','Create Language')

@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{ __('Language') }}</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ __('Language') }}</li>
            </ol>
            <a href="{{ route('languages.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                <i class="fas fa-arrow-left"></i> {{ __('Back') }}
            </a>
        </div>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Create Language</h4>
        <form method="POST" action="{{ route('languages.store') }}" role="form" enctype="multipart/form-data" class="language">
            @csrf
            @include('admin.language.form')
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var _token = $("input[name='_token']").val();
    $(".language").validate({
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
            code:{
                "remote":
                {
                    url: "{{ route('languages.check_code') }}",
                    type: "POST",
                    data: {
                        _token:_token,
                        code: function() {
                            return $("input[name='code']").val();
                        }
                    },
                }
            }
        },
        messages:{
            code:{
                required: "Please enter a valid and unique code for this language.",
                remote: jQuery.validator.format("The language code {0} is already exist.")
            }
        }
    });
</script>
@endsection