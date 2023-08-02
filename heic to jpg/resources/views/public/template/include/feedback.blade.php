<div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="modal-title" id="exampleModalLabel">{{ __(dynamicString('feedback_heading',$language->id)) }}</h4>
                <p>{{ __(dynamicString('required_email',$language->id)) }}</p>
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
                    <div class="row">
                        <div class="form-group mt-3">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message" required="required"></textarea>
                        </div>
                        <div class="form-group col-lg-6 mt-3">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name*" name="name" required="required">
                        </div>
                        <div class="form-group col-lg-6 mt-3 ps-2">
                            <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email*" name="email" required="required">
                        </div>
                        <button type="submit" class="btn submit-btn mt-3">{{ __(dynamicString('submit_comment',$language->id)) }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Newslatter -->
<div class="modal fade newslatter" id="popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body row justify-content-center align-items-center flex-column">
                <div class="upper-div">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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
                @if($message = Session::get('newsletterMessage'))
                    <div class="alert alert-dismissible alert-success col-lg-3">
                        <strong class="text-center">{{ $message }}</strong>
                    </div>
                @endif
                <h1 class="modal-title mt-3 text-center" id="exampleModalLabel">{{ __(dynamicString('join_heading',$language->id)) }}</h1>
                <p class="text-center col-lg-6">{{ __(dynamicString('news_latter_description',$language->id)) }}</p>
                <div class="row justify-content-around col-lg-10 mt-3 mb-3">
                    <div class="col-lg-5">
                        <p>{{ __(dynamicString('list_main_heading',$language->id)) }}</p>
                        <ul>
                            <li>{{ __(dynamicString('newslist_one',$language->id)) }}</li>
                            <li>{{ __(dynamicString('newslist_two',$language->id)) }}</li>
                            <li>{{ __(dynamicString('newslist_three',$language->id)) }}</li>
                        </ul>
                    </div>
                    <div class="form-container rounded-2 col-lg-5 p-3">
                        <form method="POST" action="{{ route('newsletter.store') }}"  class="d-flex flex-column align-items-center" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-lg-12 mt-2">
                                <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Your Full Name" required="required">
                            </div>
                            <div class="form-group col-lg-12 mt-2">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email Address" required="required">
                            </div>
                            <button type="submit" class="btn comment-btn rounded-5 p-3 mt-3">{{ __(dynamicString('newsform_button',$language->id)) }}</button>
                        </form>
                    </div>
                </div>
                <div class="lower-div"></div>
            </div>
        </div>
    </div>
</div>