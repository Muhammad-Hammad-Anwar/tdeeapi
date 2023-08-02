@extends('admin.layout.app')

@section('title')
    {{ $tool->title ?? 'Show Tool' }}
@endsection

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Show Tool</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tools.index') }}">Tool</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
        <a href="{{ route('tools.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Show Tool
    </div>
    <div class="card-body">
        <h4 class="card-title">{{ $tool->title }}</h4>
        <p class="card-text">{{ $tool->blade }}</p>
        <p>
            @if($tool->examples)
                @foreach($tool->examples as $key => $example)
                    <strong>Example {{ ++$key }} : </strong>{!! $example !!}</br>
                @endforeach
            @endif
        </p>
    </div>
    <div class="card-body">
        <h4 class="card-title">Test Tool</h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @include('admin.tool.include.'.$tool->blade)
    </div>
    <div class="card-footer text-muted">
        @if ($pods = Session::get('data'))
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tool Result</h4>
                    <div id="accordian-3">
                        @foreach($pods as $key => $pod)
                        <div class="card">
                            <a class="card-header bg-success" id="heading_{{$key}}">
                                <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse_{{$key}}" aria-expanded="true" aria-controls="collapse1">
                                    <h5 class="m-b-0 text-white">{{ $pod['title'] }}</h5>
                                </button>
                            </a>
                            <div id="collapse_{{$key}}" class="collapse {{ $key == 0 ? 'show' : ''}}" aria-labelledby="heading_{{$key}}" data-parent="#accordian-3">
                                <div class="card-body">
                                    @foreach($pod['subpods'] as $subpod)
                                        <div class="row">
                                            <div class="col-md-4"> 
                                                <img src="{{ $subpod['img']['src'] }}" class="img-responsive thumbnail m-r-15"> 
                                            </div>
                                            <div class="col-md-8">
                                                {{ $subpod['plaintext'] }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        @if ($data = Session::get('result'))
            <div class="card" id="steps">
                <div class="card-body">
                    <h4 class="card-title">Tool Result</h4>
                    <div id="accordian-3">
                        <div class="card" >
                            <a class="card-header bg-success" id="heading">
                                <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="true" aria-controls="collapse1">
                                    <h5 class="m-b-0 text-white">Steps</h5>
                                </button>
                            </a>
                            @foreach($data['steps'] as $key => $step )
                            <div id="collapse" class="collapse show" aria-labelledby="heading_{{$key}}" data-parent="#accordian-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            {!! $step !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="card" >
                            <a class="card-header bg-success" id="heading">
                                <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse_answer" aria-expanded="true" aria-controls="collapse1">
                                    <h5 class="m-b-0 text-white">Answers</h5>
                                </button>
                            </a>
                            <div id="collapse_answer" class="collapse" aria-labelledby="heading" data-parent="#accordian-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            {{ $data['answer'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
@section('scripts')
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            var indefinite_answer = $("#steps").last().find("script").last();
            $("#steps").find("script").replaceWith(function () {
                return $("<span />", { html: "$$" + $(this).html() + "$$" });
            }),
            MathJax.typesetPromise().then(() => {
                MathJax.typesetPromise();
            })
        });
</script>
@endsection