@extends('admin.layout.app')

@section('title','Dynamic String')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">{{ __('Dynamic Strings') }}</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ __('Strings') }}</li>
        </ol>
        @can('strings-create')
        <a href="{{ route('dynamic-strings.create') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="fa fa-plus-circle"></i> Create New
        </a>
        @endcan
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ __('Dynamic Strings') }}</h4>
        <table class="table table-striped border datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Language</th>
                    <th>Key</th>
                    <th>Value</th>
                    <th width="10px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dynamicStrings as $key => $dynamicString)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $dynamicString->language->name }}</td>
                        <td>{{ $dynamicString->key }}</td>
                        <td>{{ $dynamicString->value }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu animated lightSpeedIn dropdown-menu-end">
                                    @if($dynamicString->language_id == 1)
                                    @can('strings-edit')
                                    <a class="dropdown-item" href="{{ route('string.add',$dynamicString->id) }}">
                                        <i class="fa fa-plus-circle"></i> Add Language
                                    </a>
                                    @endcan
                                    @endif
                                    @can('strings-view')
                                    <a class="dropdown-item" href="{{ route('dynamic-strings.show',$dynamicString->id) }}">
                                        <i class="fa fa-fw fa-eye"></i> Show
                                    </a>
                                    @endcan
                                    @can('strings-edit')
                                    <a class="dropdown-item" href="{{ route('dynamic-strings.edit',$dynamicString->id) }}">
                                        <i class="fa fa-fw fa-edit"></i> Edit
                                    </a>
                                    @endcan
                                    @if($dynamicString->language_id != 1)
                                    @can('strings-delete')
                                    <form action="{{ route('dynamic-strings.destroy',$dynamicString->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item sa-confirm">
                                            <i class="fa fa-fw fa-trash"></i> Delete
                                        </button>
                                    </form>
                                    @endcan
                                    @endif
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