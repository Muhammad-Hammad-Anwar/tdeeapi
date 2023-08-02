@extends('admin.layout.app')

@section('title','Update String')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Edit String</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dynamic-strings.index') }}">String</a></li>
            <li class="breadcrumb-item active">Edit</li>
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
        <h4 class="card-title">Edit String</h4>
        <form method="POST" action="{{ route('dynamic-strings.update', $dynamicString->id) }}"  role="form" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('admin.string.form')
        </form>
    </div>
</div>
@endsection