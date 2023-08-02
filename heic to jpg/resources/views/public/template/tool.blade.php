<!--breadcrumbs-->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-3 ps-5">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __(dynamicString('home',$language->id)) }}</a></li>
        <li class="breadcrumb-item"><a href="{{ $page->parent->slug }}">{{ $page->parent->title }}</a></li>
        <li class="breadcrumb-item active">{{ $page->title }}</li>
    </ol>
</nav>
<div class="row px-lg-5">
    <div class="col-lg-9 col-md-12">
        <div class="row main-content px-3 py-5">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                <h1 class="main-heading text-center">{{ $page->title }}</h1>
                <p class="excerpts">{{ $page->description }}</p>   
            </div>
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!--Tool Content here-->
            @include('public.tool.'.$page->tool->blade)
            <!--Tool Content here-->

            <!--Tool Result Inluce here-->
            @include('public.template.include.tool_result')
            <!--Tool Result Inluce here-->
            <div class="col-12 mt-5">
                <div class="row gx-2 gy-2 cal-cards">
                    @foreach(toolPages($language->id) as $tool)
                    <div class="col-md-4">
                        <div class="card border-0 rounded-0 pl-5">
                            <div class="card-body p-2 d-flex align-items-center">
                                <div>
                                    <img src="{{ asset($tool->image) }}" alt="{{ $tool->title }}">
                                </div>
                                <div class="ps-2">
                                    <a href="{{ url(urlGenerate($tool->slug,$language->id)) }}">
                                        <p class="inner-heading">{{ $tool->title }}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> 
            </div>
        </div>     
        <!--Content-->
        <div class="content-container row justify-content-between px-3 py-5 mt-5">
            <div class="col-lg-5 col-md-5 mb-3">
                <h5 class="tab-heading">{{ __(dynamicString('table_of_contents',$language->id)) }}</h5>
                <div class="tab-content" id="table-of-contents">
                </div>
            </div>
            <div class="col-md-5">
                <div class="tabs mt-3">
                    <h5 class="tab-heading">{{ __(dynamicString('widget_heading',$language->id)) }}</h5>
                    <p>{{ __(dynamicString('widget_description',$language->id)) }}</p>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="tab-btn">{{ __(dynamicString('get_code',$language->id)) }}</button>
                    </div>
                </div>
                <div class="tabs mt-3">
                    <h5 class="tab-heading">{{ __(dynamicString('feedback_heading',$language->id)) }}</h5>
                    <p>{{ __(dynamicString('feedback_description',$language->id)) }}</p>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="tab-btn" data-toggle="modal" data-target="#feedback">
                            {{ __(dynamicString('feedback_heading',$language->id)) }}
                        </button>
                    </div>
                </div>
                <div class="tabs mt-3">
                    <h5 class="tab-heading">{{ __(dynamicString('App_link_heading',$language->id)) }}</h5>
                    <p>{{ __(dynamicString('App_link_description',$language->id)) }}</p>
                    <div class="d-flex align-items-center justify-content-around app-link">
                        <a href="{{ url(settings('playstore_link')) }}" target="_blank" type="button" class="tab-btn d-flex align-items-center justify-content-center">
                            <img class="me-2" src="{{ asset('public/images/Group 11.webp') }}"/>{{ __(dynamicString('play_store',$language->id)) }}</a>
                        <a href="{{ url(settings('app_store_link')) }}" target="_blank" type="button" class="tab-btn d-flex align-items-center justify-content-center px-4">
                            <img class="me-2" src="{{ asset('public/images/Group 30.webp') }}"/>{{ __(dynamicString('app_store',$language->id)) }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row page-text p-3 mt-5">
            <div class="page-content">{!! $page->content !!}</div>
        </div>
        <!-- Author Section -->
        @include('public.template.include.auther')
        <!--Comment-section-->
        @include('public.template.include.comments')
    </div>
    <div class="col-lg-3">
        Advertisment
    </div>
</div>
@section('scripts')
@endsection