@extends('admin.layout.app')

@section('title','Show Language')

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
        <h4 class="card-title">Show Language</h4>
        <table class="table no-border d-flex">
            <tbody>
                <tr>
                    <td class="card-title">Name</td>
                    <td class="card-title">Code</td>
                </tr>
                <tr>
                    <td>{{ $language->name }}</td>
                    <td align="right"><span class="badge rounded-pill bg-info">{{ $language->code }}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection