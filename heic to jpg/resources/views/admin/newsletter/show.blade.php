@extends('admin.layout.app')

@section('title','Show Newsletter')

@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Show Newsletter</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('newsletters.index') }}">Newsletter</a></li>
                <li class="breadcrumb-item active">Show </li>
            </ol>
            <a href="{{ route('newsletters.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
            </a>
        </div>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Show Newsletter</h4>
        <div class="card-body">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $newsletter->name }}
            </div>
            <div class="form-group flex-column">
                <strong>Email:</strong>
                {{ $newsletter->email }}
            </div>
        </div>
    </div>
</div>
@endsection

