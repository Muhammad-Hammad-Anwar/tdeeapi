@extends('admin.layout.app')

@section('title','Show Api Token')

@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Show Api Token</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('api-tokens.index') }}">Api Token</a></li>
                <li class="breadcrumb-item active">Show</li>
            </ol>
            <a href="{{ route('api-tokens.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
            </a>
        </div>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Create Api Token</h4>
        <div class="row">
            <div class="form-group col-lg-12">
                <strong>Code:</strong>
                {{ $apiToken->code }}
            </div>
            <div class="form-group col-lg-12">
                <strong>Limit:</strong>
                {{ number_format($apiToken->limit) }}
            </div>
            <div class="form-group col-lg-12">
                <strong>Web Utilize:</strong>
                {{ number_format($apiToken->web_utilize) }}
            </div>
            <div class="form-group col-lg-12">
                <strong>App Utilize:</strong>
                {{ number_format($apiToken->app_utilize) }}
            </div>
            @php($percentage = (($apiToken->web_utilize + $apiToken->app_utilize) * 100) / $apiToken->limit)
            <div class="col-lg-12">
                <div class="text-center">
                    <input data-plugin="knob" data-width="250" data-height="250" data-angleOffset="0" data-linecap="round" data-fgColor="#7460ee" value="{{ round($percentage, 0) }}" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function() {
        $('[data-plugin="knob"]').knob();
    });
</script>
@endsection