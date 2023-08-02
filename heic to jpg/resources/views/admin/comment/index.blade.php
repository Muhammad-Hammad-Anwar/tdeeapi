@extends('admin.layout.app')

@section('title','Comments')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Comments</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Comments</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ __('Comments') }}</h4>
        <table class="datatable table table-striped border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Page</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Read At</th>
                    <th>Status</th>
                    <th width="10px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as  $key => $comment)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $comment->page->slug}}</td>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->read_at }}</td>
                        <td>{{ $comment->status }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu animated lightSpeedIn dropdown-menu-end">
                                    @can('comments-view')
                                    <a class="dropdown-item" href="{{ route('comments.show',$comment->id) }}">
                                        <i class="fa fa-fw fa-eye"></i> Show
                                    </a>
                                    @endcan
                                    @if($comment->status == 'UnPublish')
                                    @can('comments-publish')
                                    <form action="{{ route('comments.update',$comment->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <input type="hidden" name="status" value="Publish">
                                        <button type="submit" class="dropdown-item publish-confirm">
                                            <i class="fas fa-upload"></i> Publish
                                        </button>
                                    </form>
                                    @endcan
                                    @endif
                                    @if($comment->status == 'Publish')
                                    @can('comments-unPublish')
                                    <form action="{{ route('comments.update',$comment->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <input type="hidden" name="status" value="UnPublish">
                                        <button type="submit" class="dropdown-item unpublish-confirm">
                                            <i class="fas fa-download"></i> UnPublish
                                        </button>
                                    </form>
                                    @endcan
                                    @endif
                                    @can('comments-delete')
                                    <form action="{{ route('comments.destroy',$comment->id) }}" method="POST">
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
<script>
    $(function () {
        $(".publish-confirm").click(function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This comment will be display on frontend page!",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Approve it!'
            }).then((result) => {
                if (result.value === true)  $(this).closest("form").submit();
            });
        });
    });
</script>
</script>
<script>
    $(function () {
        $(".unpublish-confirm").click(function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This page comment will not be displayed on frontend after this!",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, UnPublish it!'
            }).then((result) => {
                if (result.value === true)  $(this).closest("form").submit();
            });
        });
    });
</script>
@endsection