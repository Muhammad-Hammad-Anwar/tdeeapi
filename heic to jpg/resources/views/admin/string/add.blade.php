@extends('admin.layout.app')

@section('title','Create Dynamic String')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Add Dynamic String</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dynamic-strings.index') }}">Dynamic String</a></li>
            <li class="breadcrumb-item active">Add</li>
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
        <h4 class="card-title">Add String</h4>
        <form method="POST" action="{{ route('dynamic-strings.store') }}" role="form" enctype="multipart/form-data" class="string">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    {{ Form::label('language') }}
                    {{ Form::select('language_id', $languages, $dynamicString->language_id,['class' => 'form-control' . ($errors->has('language_id') ? ' is-invalid' : ''),'placeholder'=>'--Select--','required']) }}
                    {!! $errors->first('language_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('key') }}
                    {{ Form::text('key', $dynamicString->key,['class' => 'form-control' . ($errors->has('key') ? ' is-invalid' : ''),'readonly']) }}
                    {!! $errors->first('key', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-md-12">
                    {{ Form::label('value') }}
                    {{ Form::textarea('value', $dynamicString->value, ['class' => 'form-control' . ($errors->has('value') ? ' is-invalid' : ''), 'placeholder' => 'Value','required','rows'=>'3']) }}
                    {!! $errors->first('value', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="box-footer mt20">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
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
        }
    });
</script>
@endsection