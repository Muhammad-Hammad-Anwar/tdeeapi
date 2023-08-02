@extends('admin.layout.app')

@section('title','Show Comment')

@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Show Comment</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('comments.index') }}">Comment</a></li>
                <li class="breadcrumb-item active">Show </li>
            </ol>
            <a href="{{ route('comments.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
            </a>
        </div>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Show Comment</h4>
        <div class="form-group">
            <strong>Page Title:</strong>
            {{ $comment->page->title }}
        </div>
        <div class="form-group">
            <strong>Name:</strong>
            {{ $comment->name }}
        </div>
        <div class="form-group flex-column">
            <strong>Email:</strong>
            {{ $comment->email }}
        </div>
        <div class="form-group flex-column">
            <strong>Message:</strong>
            {{ $comment->message }}
        </div>
        <form method="POST" action="{{ route('comments.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="page_id" value="{{ $comment->page->id }}">
            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
            <div class="row">
                <div class="form-group col-md-6">
                    {{ Form::label('name') }}
                    {{ Form::text('name', Auth::user()->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('email') }}
                    {{ Form::email('email', Auth::user()->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Name','readonly','required']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-md-12">
                    {{ Form::label('reply') }}
                    {{ Form::textarea('message', '', ['class' => 'form-control' . ($errors->has('message') ? ' is-invalid' : ''), 'placeholder' => 'Reply','required','rows'=>'3']) }}
                    {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="box-footer mt20">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <h4 class="card-title">{{ __('Reply') }}</h4>
        <table class="datatable table table-striped border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th width="10px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comment->replyComments as  $key => $reply)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $reply->name }}</td>
                        <td>{{ $reply->email }}</td>
                        <td>{{ $reply->message }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu animated lightSpeedIn dropdown-menu-end">
                                    @can('comments-delete')
                                    <form action="{{ route('comments.destroy',$reply->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item sa-confirm">
                                            <i class="fa fa-fw fa-trash"></i> Delete
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function () {
        $(".datatable").DataTable();
        $(".sa-confirm").click(function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value === true)  $(this).closest("form").submit();
            });
        });
    });
</script>
@endsection