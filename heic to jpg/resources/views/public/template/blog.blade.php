<div class="px-5">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-3 ms-3">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __(dynamicString('home',$language->id)) }}</a></li>
    <li class="breadcrumb-item"><a href="{{ $page->parent->slug }}">{{ __(dynamicString('blogs',$language->id)) }}</a></li>
    <li class="breadcrumb-item">{{ $page->title }}</li>
    </ol>
    </nav>
    <!--Content-->
    <div class="blog box-shadow bg-white">
        <div class="row flex-column justify-content-center align-items-center p-4">
            <div class="col-lg-10 text-center">
                <h1 class="blog-heading">{{ $page->title }}</h1>
                <p class="excerpts">{{ $page->description }}</p>
                <div class="d-flex justify-content-center align-items-center">
                    <p class="blog-author">{{ $page->auther->name }} - Published on - {{ $page->published_at }}</p>
                </div>
            </div>
            <div class="social col-lg-3 d-flex justify-content-evenly mt-3 pb-3">
                <div class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}"><img src="{{ asset('public/images/Vector.webp') }}"/></a></div>
                <div><a href="https://twitter.com/intent/tweet?url={{ Request::url() }}&text=Spin%20PDF"><img src="{{ asset('public/images/Vector-1.webp') }}"/></a></div>
              	<div><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}"><img src="{{ asset('public/images/Group 75.webp') }}"/></a></div>
              <div><a href="http://pinterest.com/pin/create/button/?url=/node/[nid]&description=[title]"><img src="{{ asset('public/images/pintrest.webp') }}"/></a></div>
            </div>
        </div>
    </div>
</div>
<div class="px-5 mt-5">
    <div class="row bg-white content-tab box-shadow gx-4">
        <div class="col-lg-12">
            <div class="table-of-contents p-5">
                <h2>{{ __(dynamicString('table_of_contents',$language->id)) }}</h2>
                <div class="tab-content" id="table-of-contents">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="px-5">
    <div class="row gx-4">
        <div class="col-lg-8 ">
            <div class="page-content box-shadow bg-white p-4 mt-5">
                {!! @$page->content !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="bg-white box-shadow related-articles mt-5 p-3">
                <h2 class="text-center">{{ __(dynamicString('related_articles',$language->id)) }}</h2>
                @foreach( $page->relatedPages as $relatedBlog)
                <ul>
                    <li><a href="{{ url(urlGenerate($relatedBlog->parent->slug,$language->id)) }}">{{ $relatedBlog->parent->title }}</a></li>
                </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>