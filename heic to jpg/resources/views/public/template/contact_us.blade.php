<div class="blog-header mt-5">
    <div class="container p-5">
        <div class="row justify-content-center align-items-center p-4">
            <div class="col-lg-10 about-info">
                <h1 class="text-center">{{ $page->title }}</h1>
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if($message = Session::get('feedbackMessage'))
                        <div class="alert alert-dismissible alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('feedback.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row align-items-center justify-content-center">
                            <div class="form-group col-lg-6 mt-3">
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name*" name="name">
                            </div>
                            <div class="form-group col-lg-6 mt-3 ps-2">
                                <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email*" name="email">
                            </div>
                            <div class="form-group mt-3">
                                <textarea placeholder="What's your thought..." class="form-control" id="exampleFormControlTextarea1" rows="5" name="message"></textarea>
                            </div>
                            <div class="from-group d-flex justify-content-center mt-3">                      	
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            </div>
                            <button type="submit" class="btn comment-btn mt-3 col-lg-3">{{ __(dynamicString('submit_comment',$language->id)) }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
