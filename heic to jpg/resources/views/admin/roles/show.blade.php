@extends('admin.layout.app')

@section('title')
    {{ $role->name ?? 'Show Role' }}
@endsection

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Roles</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('Role') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Show') }}</li>
        </ol>
        <a href="{{ route('roles.index') }}" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="fas fa-arrow-left"></i> {{ __('Back') }}
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Show Role</h4>
        <h6 class="card-title">
            <strong>Name:</strong> {{ $role->name }}
        </h6>
        <h6 class="card-title">
            <strong>Permissions:</strong>
        </h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Module Name</th>
                        <th>List</th>
                        <th>View</th>
                        <th>Create</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Publish</th>
                        <th>UnPublish</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 0)
                    @foreach($permissionGroup as $module => $permissions)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td><strong>{{ ucfirst($module) }}</strong></td>
                            @foreach($permissions as $key => $permission)
                                <td>
                                    <input 
                                        name        = "permission[]" 
                                        value       = "{{ $permission['id'] }}" 
                                        type        = "checkbox" 
                                        class       = "js-switch" 
                                        data-color  = "#26c6da" 
                                        data-size   = "small"
                                        {{ $permission['exist'] }}/>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function () {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function () {
            new Switchery($(this)[0], $(this).data());
        });
    });
</script>
@endsection