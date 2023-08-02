<div class="comment mt-5 p-4">
    <h2>{{ $page->comments()->count() }} Comment</h2>
    <div class="card card-body mb-3">
        <div class="reply-form" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        @if($message = Session::get('commentMessage'))
                            <div class="alert alert-dismissible alert-success">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <h4 class="modal-title" id="exampleModalLabel">{{ __(dynamicString('comment_heading',$language->id)) }}</h4>
                        <form method="POST" action="{{ route('comment.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="page_id" value="{{ $page->id }}">
                            <div class="row justify-content-center">
                                <div class="form-group mt-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                                </div>
                                <div class="form-group col-lg-6 mt-3">
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name*" name="name">
                                </div>
                                <div class="form-group col-lg-6 mt-3 ps-lg-2 ps-sm-0">
                                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email*" name="email">
                                </div>
                                <button type="submit" class="btn comment-btn col-lg-3 mt-3">{{ __(dynamicString('submit_comment',$language->id)) }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="comment-body pb-3">
        @foreach($page->comments as $comment)
            <div class="user">
                <div class="d-flex align-items-center">
                    <div class="user-text d-flex justify-content-center align-items-center">
                        <p>{{ implode ('',array_map(function ($item) {return strtoupper($item[0]);} , explode(' ', $comment->name)))}}</p>
                    </div>
                    <div class="user-name ms-3">{{ $comment->name }}</div>
                </div>
                <div class="user-message mt-3">
                    <p>{{ $comment->message }}</p>
                </div>
            </div>
            @foreach($comment->replyComments as $reply)
            <div class="admin mt-5 p-3">
                <div class="d-flex align-items-center">
                    <div class="admin-text d-flex justify-content-center align-items-center">
                        <p>{{ implode ('',array_map(function ($item) {return strtoupper($item[0]);} , explode(' ', $reply->name)))}}</p>
                    </div>
                    <div class="user-name ms-3">{{ $reply->name }}</div>
                </div>
                <div class="user-message mt-3">
                    <p>{{ $reply->message }}</p>
                </div>
            </div>
            @endforeach
        @endforeach
    </div>
</div>