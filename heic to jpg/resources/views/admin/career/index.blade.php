@extends('admin.layout.app')

@section('title','Career')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Career</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Career</li>
        </ol>
        @can('career-create')
        <a href="{{ route('careers.create') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="fa fa-plus-circle"></i> Create New
        </a>
        @endcan
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ __('Career') }}</h4>
        <table class="datatable table table-striped border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th width="10px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($careers as  $key => $career)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $career->title }}</td>
                        <td>{{ $career->type }}</td>
                        <td>{{ $career->order }}</td>
                        <td>
                            <span class="label {{ $career->status == 'Publish' ? 'label-success' : 'label-danger'}}">
                                {{ $career->status }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu animated lightSpeedIn dropdown-menu-end">
                                    @can('career-view')
                                    <a class="dropdown-item" href="{{ route('careers.show',$career->id) }}">
                                        <i class="fa fa-fw fa-eye"></i> Show
                                    </a>
                                    @endcan
                                    @can('career-edit')
                                    <a class="dropdown-item" href="{{ route('careers.edit',$career->id) }}">
                                        <i class="fa fa-fw fa-edit"></i> Edit
                                    </a>
                                    @endcan
                                    @can('career-delete')
                                    <form action="{{ route('careers.destroy',$career->id) }}" method="POST">
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