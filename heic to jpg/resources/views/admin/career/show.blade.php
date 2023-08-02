@extends('admin.layout.app')

@section('title')
    {{ $career->name ?? 'Show Career' }}
@endsection

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Show Career</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('careers.index') }}">Career</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
        <a href="{{ route('careers.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
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
                <strong>Title:</strong>
                {{ $career->title }}
            </div>
            <div class="form-group col-md-3">
                <strong>Type:</strong>
                {{ $career->type }}
            </div>
            <div class="form-group col-md-3">
                <strong>Status:</strong>
                {{ $career->status }}
            </div>
            <div class="form-group col-md-12">
                <strong>Description:</strong>
                {{ $career->description }}
            </div>
            <div class="form-group col-md-12">
                <strong>Detail:</strong>
                {!! $career->detail !!}
            </div>
        </div>
    </div>
</div>
@endsection