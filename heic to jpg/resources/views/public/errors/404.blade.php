@extends('public.layout.app')

@section('title')
    Page Not Found
@endsection

@section('content')
    <!--
    |--------------------------------------------------------------------------
    | Page Header include here
    |--------------------------------------------------------------------------
    -->@include('public.layout.include.header')
    
    <!--
    |--------------------------------------------------------------------------
    | Page Content Here
    |--------------------------------------------------------------------------
    -->
    <div class="row align-items-center justify-content-center text-center">
        <div class="col-lg-9 mt-5 mb-5">
            <h1 class="error-heading">404</h1>
            <h2 class="second-heading">{{ __(dynamicString('not_found_heading',$language->id)) }}</h2>
            <p class="third-heading">{{ __(dynamicString('sorry_heading',$language->id)) }}</p>
            <div class="d-flex align-items-center justify-content-around icon-tabs">
                <div class="home-icon">
                    <a href="{{ route('home') }}"><img src="{{ asset('public/images/home icon.png') }}"/></a>
                </div>
                @foreach($language->fourOfourMenus as $item)
                    <a href="{{ url($item->url) }}">{{ $item->title }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <!--
    |--------------------------------------------------------------------------
    | Page Footer include here
    |--------------------------------------------------------------------------
    -->@include('public.layout.include.footer')
@endsection