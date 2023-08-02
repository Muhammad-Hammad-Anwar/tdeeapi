@extends('public.layout.app')

@section('title'){{ $page->metaTitle }}@endsection

@section('head')
    <meta name="description"content="{{ $page->metaDescription }}"/>
    <meta name="robots"     content="{{ $page->status == 'UnPublish' ? 'noindex, nofollow' : 'index, follow' }}">
    <link rel="canonical"   href   ="{{ $page->canonical}}"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Font+Name&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-xyz" crossorigin="anonymous">

    <link rel="alternate" hreflang="x-default" href="{{ url($page->slug) }}"/>
    @foreach(hreflang($page->slug) as $pageLang)<link rel="alternate" hreflang="{{ $pageLang->code }}" href="{{ $pageLang->code == 'en' ? url($page->slug ) : url($pageLang->code.'/'.$page->slug)}}"/>
    @endforeach

    <!-- Open Graph general -->
    {!! $page->og_tags !!}
    <!-- Open Graph general -->
    
    <!-- Schema.org for Google -->
    {!! $page->schemas !!}
    <!-- Schema.org for Google -->
@endsection

@section('content')
    <!--
    |--------------------------------------------------------------------------
    | Page Header include here
    |--------------------------------------------------------------------------
    -->
    @include('public.layout.include.header')
    
    @if($page->template =='Home')
    <!--
    |--------------------------------------------------------------------------
    | Home page template include here
    |--------------------------------------------------------------------------
    -->
    @include('public.template.home')

    @elseif($page->template =='Tool')
    <!--
    |--------------------------------------------------------------------------
    | Tool page template include here
    |--------------------------------------------------------------------------
    -->
    @include('public.template.tool')

    @elseif($page->template =='Blog')
    <!--
    |--------------------------------------------------------------------------
    | Blog page template include here
    |--------------------------------------------------------------------------
    -->
    @include('public.template.blog')

    @elseif($page->template =='Problem')
    <!--
    |--------------------------------------------------------------------------
    | Problem page template include here
    |--------------------------------------------------------------------------
    -->
    @include('public.template.problem')

    @elseif($page->template =='Category')
    <!--
    |--------------------------------------------------------------------------
    | Category page template include here
    |--------------------------------------------------------------------------
    -->
    @include('public.template.category')

    @elseif($page->template =='Career')
    <!--
    |--------------------------------------------------------------------------
    | Career page template include here
    |--------------------------------------------------------------------------
    -->
    @include('public.template.career')

    @elseif($page->template =='Contact_us')
    <!--
    |--------------------------------------------------------------------------
    | Contact US page template include here
    |--------------------------------------------------------------------------
    -->
    @include('public.template.contact_us')

    @else
    <!--
    |--------------------------------------------------------------------------
    | Other all simple pages template include here
    |--------------------------------------------------------------------------
    -->
    @include('public.template.simple')
    @endif 
    
    <!--
    |--------------------------------------------------------------------------
    | Page Footer include here
    |--------------------------------------------------------------------------
    -->
    @include('public.layout.include.footer')
@include('public.template.include.feedback')
@endsection
@section('tool_scripts')
<script>
    MathJax = {
        tex: {
            inlineMath: [
                ['$', '$'], ['\\(', '\\)']
            ]
        }
    };
    function AddScript(src) {
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.src = src;
        s.setAttribute('async', 'async');
        $("body").append(s);
    }

    window.onload = function() {
        setTimeout(function() {
            AddScript('{{ asset('public/js/bootstrap.bundle.min.js')}}');
            AddScript('{{ asset('public/js/nerdamer.core.min.js') }}');
            AddScript('{{ asset('public/js/math.min.js') }}');
            AddScript('https://polyfill.io/v3/polyfill.min.js?features=es6');
            AddScript('https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js');
            AddScript('{{ asset('public/js/global.min.js?v=1') }}');
        }, 1000);
    }
</script>
<script src="https://kit.fontawesome.com/5dff11c539.js" crossorigin="anonymous"></script>
@endsection