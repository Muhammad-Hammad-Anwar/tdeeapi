@extends('layouts.app')

@section('template_title')
    {{ $element->name ?? "{{ __('Show') Element" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Element</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('elements.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Element:</strong>
                            {{ $element->element }}
                        </div>
                        <div class="form-group">
                            <strong>Atomicmass:</strong>
                            {{ $element->atomicmass }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
