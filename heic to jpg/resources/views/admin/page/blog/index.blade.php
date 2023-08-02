@extends('admin.layout.app')

@section('title','Blog')

@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{ __('Blog') }}</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ __('Blog') }}</li>
            </ol>
            @can('blogPage-create')
            <a href="{{ route('pages.blog.create') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                <i class="fa fa-plus-circle"></i> Create New
            </a>
            @endcan
        </div>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ __('Blog') }}</h4>
        <table class="datatable table table-striped border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Auther</th>
                    <th>Published At</th>
                    <th>Status</th>
                    <th>Language</th>
                    <th width="10px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as  $key => $page)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->slug }}</td>
                        <td>{{ $page->auther->name }}</td>
                        <td>{{ $page->published_at }}</td>
                        <td>{{ $page->status }}</td>
                        <td>{{ $page->language->name }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu animated lightSpeedIn dropdown-menu-end">
                                    @can('blogPage-view')
                                    <a class="dropdown-item" href="{{ url($page->slug) }}" target="_blank">
                                        <i class="fa fa-fw fa-eye"></i> Show
                                    </a>
                                    @endcan
                                    @can('blogPage-edit')
                                    <a class="dropdown-item" href="{{ route('pages.blog.edit',$page->id) }}">
                                        <i class="fa fa-fw fa-edit"></i> Edit
                                    </a>
                                    @endcan
                                    @if($page->status == 'UnPublish')
                                    @can('blogPage-publish')
                                    <form action="{{ route('pages.publish',$page->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <button type="submit" class="dropdown-item publish-confirm">
                                            <i class="fas fa-upload"></i> Publish
                                        </button>
                                    </form>
                                    @endcan
                                    @endif
                                    @if($page->status == 'Publish')
                                    @can('blogPage-unPublish')
                                    <form action="{{ route('pages.unpublish',$page->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <button type="submit" class="dropdown-item unpublish-confirm">
                                            <i class="fas fa-download"></i> UnPublish
                                        </button>
                                    </form>
                                    @endcan
                                    @endif
                                    @can('blogPage-delete')
                                    <form action="{{ route('pages.destroy',$page->id) }}" method="POST">
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
                text: "This page will be follow and index after this!",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Publish it!'
            }).then((result) => {
                if (result.value === true)  $(this).closest("form").submit();
            });
        });
    });
</script>
<script>
    $(function () {
        $(".unpublish-confirm").click(function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This page will be added no follow and no index after this!",
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