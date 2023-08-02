@if($page->auther)
<section class="bsb-author-1 author-container mt-5 py-5 py-xl-8 bsb-hover-special-x">
    <div class="container overflow-hidden">
        <div class="row flex-column align-items-center justify-content-center gy-4 gy-md-0">
            <div class="col-12 col-md-3 col-xl-2 d-flex align-items-center justify-content-center">
                <img class="avatar rounded-circle" alt="avatar1" src="{{ asset($page->auther->image) }}" />
            </div>
            <div class="col-12 col-md-8 col-lg-10 d-flex align-items-center justify-content-center">
                <div class="text-md-start bsb-hover-special-pull-x">
                    <div class="d-flex align-items-center flex-column text-center">
                        <div class="">
                            <h4 class="author-name mb-0">{{ $page->auther->name }}</h4>
                            <p class="upadated-date">Last Updated: {{ $page->auther->updated_at->diffForHumans();}}</p>
                        </div>
                        <div class="social-icons d-flex">
                            @foreach($page->auther->socialLinks as $link)
                                <a href="{{ url($link->link) }}" target="_blank">
                                    <i class="fa-brands {{ $link->type }}"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <p class="author-description mb-3 text-center mt-3"> {{ $page->auther->bio }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif