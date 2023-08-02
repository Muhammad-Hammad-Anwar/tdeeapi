@extends('admin.layout.app')

@section('title','Show Feedback')

@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Show Feedback</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('feedbacks.index') }}">Feedback</a></li>
                <li class="breadcrumb-item active">Show </li>
            </ol>
            <a href="{{ route('feedbacks.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
            </a>
        </div>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Show Feedback</h4>
        <div class="card-body">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $feedback->name }}
            </div>
            <div class="form-group flex-column">
                <strong>Email:</strong>
                {{ $feedback->email }}
            </div>
            <div class="form-group flex-column">
                <strong>Message:</strong>
                {{ $feedback->message }}
            </div>
        </div>
    </div>
</div>
@endsection
