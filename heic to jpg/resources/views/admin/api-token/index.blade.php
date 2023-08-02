@extends('admin.layout.app')

@section('title','Api Token')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Api Token</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Api Token</li>
        </ol>
        @can('apiToken-create')
        <a href="{{ route('api-tokens.create') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="fa fa-plus-circle"></i> Create New
        </a>
        @endcan
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ __('Api Token') }}</h4>
        <table class="datatable table table-striped border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Limit</th>
                    <th>Web Consume</th>
                    <th>App Consume</th>
                    <th>Status</th>
                    <th width="10px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($apiTokens as  $key => $apiToken)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $apiToken->code }}</td>
                        <td>{{ number_format($apiToken->limit) }}</td>
                        <td>{{ number_format($apiToken->web_utilize) }}</td>
                        <td>{{ number_format($apiToken->app_utilize) }}</td>
                        <td>
                            @php($percentage = (($apiToken->web_utilize + $apiToken->app_utilize) * 100) / $apiToken->limit)
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percentage }}%;height:15px;" role="progressbar">
                                    {{ round($percentage, 2) }}% 
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu animated lightSpeedIn dropdown-menu-end">
                                    @can('apiToken-view')
                                    <a class="dropdown-item" href="{{ route('api-tokens.show',$apiToken->id) }}">
                                        <i class="fa fa-fw fa-eye"></i> Show
                                    </a>
                                    @endcan
                                    @can('apiToken-edit')
                                    <a class="dropdown-item" href="{{ route('api-tokens.edit',$apiToken->id) }}">
                                        <i class="fa fa-fw fa-edit"></i> Edit
                                    </a>
                                    @endcan
                                    @can('apiToken-delete')
                                    <form action="{{ route('api-tokens.destroy',$apiToken->id) }}" method="POST">
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