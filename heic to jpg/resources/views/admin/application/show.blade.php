@extends('admin.layout.app')

@section('title')
    {{ $jobApplication->name ?? 'Show Job Application' }}
@endsection

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Show Job Application</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('applications.index') }}">Job Application</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
        <a href="{{ route('applications.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Show Career</h4>
        <div class="row">
            <div class="form-group col-md-6">
                <strong>Name:</strong>
                {{ $jobApplication->name }}
            </div>
            <div class="form-group col-md-6">
                <strong>Email:</strong>
                {{ $jobApplication->email }}
            </div>
            <div class="form-group col-md-6">
                <strong>Career:</strong>
                {{ $jobApplication->career->title }}
            </div>
            <div class="form-group col-md-6">
                <strong>Type:</strong>
                {{ $jobApplication->career->title }}
            </div>
            <div class="form-group">
                <div class="mt-3" id="pdf-preview">
                    <embed src="{{ asset('upload/document/application/'.$jobApplication->attachment) }}" height="1000px" width="100%"></embed>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
