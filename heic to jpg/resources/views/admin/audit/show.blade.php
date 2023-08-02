@extends('admin.layout.app')

@section('title','Show Audit')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Show Audit</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('audit.index') }}">Audit</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
        <a href="{{ route('audit.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="{{ asset($audit->user->image) }}" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10">{{ $audit->user->name }}</h4>
                </center>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#detail" role="tab">Detail</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#new_value" role="tab">New Value</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#old_value" role="tab">Old Value</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="detail" role="tabpanel">
                    <table class="table no-border d-flex">
                        <tbody>
                            <tr>
                                <td class="card-title">Model</td>
                                <td>{{ $audit->auditable_type }}</td>
                            </tr>
                           
                            <tr>
                                <td class="card-title">Auditable ID</td>
                                <td>{{ $audit->auditable_id }}</td>
                            </tr>
                            <tr>
                                <td class="card-title">Time</td>
                                <td>{{ $audit->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="new_value" role="tabpanel">
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table color-table info-table">
                                @foreach($audit->new_values as $attribute => $value)
                                    <tr>
                                        <td><b>{{ $attribute }}</b></td>
                                        <td>{{ $value }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="old_value" role="tabpanel">
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table color-table info-table">
                                @foreach($audit->old_values as $attribute => $value)
                                    <tr>
                                        <td><b>{{ $attribute }}</b></td>
                                        <td>{{ $value }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
