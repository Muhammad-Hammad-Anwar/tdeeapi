<nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-3 ms-3">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __(dynamicString('home',$language->id)) }}</a></li>
      <li class="breadcrumb-item"><a href="{{ $page->parent->slug }}">{{ __(dynamicString('integral_problems',$language->id)) }}</a></li>
      <li class="breadcrumb-item">{{ $page->title }}</li>
    </ol>
</nav>
<!--Content-->
<div class="blog-header">
    <div class="container">
        <div class="row justify-content-center align-items-center p-5">
            <div class="col-lg-10 text-center">
                <h1 class="blog-heading">{{ $page->title }}</h1>
                <p class="excerpts">{{ $page->description }}</p>
                <div class="d-flex justify-content-center align-items-center">
                    <p class="blog-author">{{ $page->auther->name }}-</p>
                    <p class="date">Published on {{ $page->published_at }}</p>
                </div>
                <div class="social-icons d-flex justify-content-center">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row px-lg-5">
    <div class="col-lg-9 col-md-12">
        <div id="accordion">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center mt-5" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    {{ __(dynamicString('table_of_contents',$language->id)) }}
                  </button>
                </h5>
                <i class="fa-solid fa-chevron-down text-white"></i>
              </div>       
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="tab-list card-body" id="table-of-contents">
                    </div>
              </div>
            </div>
        </div>
        <div class="row page-text p-3 mt-5">
            <div class="page-content">
                {!! $page->content !!}
            </div>
        </div>
        <div class="d-flex flex-column justify-content-center mt-5">
            <h2 class="text-center">{{ __(dynamicString('related_problems',$language->id)) }}</h2>
            <div class="row mt-4">
                @foreach( $page->relatedPages as $relatedProblem)
                <div class="card col-lg-4">
                    <div class="blog m-3">
                        <a href="{{ url( urlGenerate($relatedProblem->parent->slug,$language->id)) }}">
                            <img class="card-img-top" src="{{ asset( $relatedProblem->parent->image ) }}" alt="Card image cap">
                        </a>
                        <div class="integral-heading text-center">
                            <h4 class="mb-0">
                                <a href="{{ url( urlGenerate($relatedProblem->parent->slug,$language->id)) }}">
                                    {{ $relatedProblem->parent->title }}
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        Advertisment
    </div>
</div>