<nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-3 ms-5">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __(dynamicString('home',$language->id)) }}</a></li>
        <li class="breadcrumb-item">{{ $page->title }}</li>
    </ol>
</nav>

@if($page->category_type == 'Tool')
<div class="container">
    <div class="heading">
        <h1 class="text-center">{{ $page->title }}</h1>
        <p class="text-center p-3 col-lg-9">{{ $page->description }}</p>
    </div>
    <div class="col-12 mt-5">
        <div class="row gx-2 gy-2 cal-cards">
            @foreach($page->childs as $tool)
            <div class="col-md-4">
                <div class="card shadow border-0 rounded-0 pl-5">
                    <div class="card-body p-2 d-flex align-items-center">
                        <div>
                            <a href="#"><img src="{{ asset($tool->image) }}"></a>
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
@endif

@if($page->category_type == 'Blog')
<div class="blog-header">
    <div class="container">
        <div class="row justify-content-center p-4">
            <h1 class="text-center mb-4">{{ $page->title }}</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach($page->childs as $key => $blog)
        <div class="col-lg-4">
            <div class="blog box-shadow">
                <a href="{{ url(urlGenerate($blog->slug,$language->id)) }}"><img class="card-img-top" src="{{ asset($blog->image) }}" alt="Card image cap"></a>
                <div class="card-body p-3">
                    <p class="card-text"><small class="text-muted">{{ $blog->published_at }}</small></p>
                    <h5 class="card-title">
                        <a href="{{ url(urlGenerate($blog->slug,$language->id)) }}">
                            {{ $blog->title }}
                        </a>
                    </h5>
                    <p class="card-text">{{ $blog->description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

@if($page->category_type == 'Problem')
<div class="container d-flex flex-column align-items-center justify-content-center">
    <h1>{{ $page->title }}</h1>
    <p class="text-center p-3 col-lg-9">{{ $page->description }}</p>
    <div class="col-12 row integral">
        @foreach($page->childs as $problem)
        <div class="card integral-category col-lg-4">
            <a href="{{ url(urlGenerate($problem->slug,$language->id)) }}">
                <img class="card-img-top" src="{{ asset($problem->image) }}" alt="Card image cap">
            </a>
            <div class="integral-heading text-center">
                <h4 class="mb-0">
                    <a href="{{ url(urlGenerate($problem->slug,$language->id)) }}">
                        {{ $problem->title }}
                    </a>
                </h4>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif