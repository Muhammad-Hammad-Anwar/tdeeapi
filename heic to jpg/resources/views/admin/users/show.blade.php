@extends('admin.layout.app')

@section('title','Show User')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Show User</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
            <li class="breadcrumb-item active">Show</li>
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
        <h4 class="card-title">Show User</h4>
        <div class="card-body d-flex justify-content-around">
            <div class="form-group">
                <img class="rounded-2" src="{{ asset($user->image) }}" width="200px"/>
            </div>
            <div class="form-group d-flex flex-column">
                <h5>User Information</h5>
                <strong>Name:</strong>
                {{ $user->name }}
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
            <div class="form-group d-flex flex-column">
                <h5>User Roles</h5>
                @foreach($user->roles as $role)
                    <span class="badge rounded-pill bg-success mt-1">{{ $role->name }}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
