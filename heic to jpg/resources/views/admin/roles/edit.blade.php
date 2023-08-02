@extends('admin.layout.app')

@section('title','Update Role')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Roles</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('Role') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Update') }}</li>
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
        <h4 class="card-title">Role Update</h4>
        <form method="POST" action="{{ route('roles.update', $role->id) }}" role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            <div class="form-group">
                {{ Form::label('name') }}
                {{ Form::text('name', $role->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required','data-validation-required-message'=>'This field is required']) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <h6 class="card-title">Permissions</h6>
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
            <div class="text-xs-right">
                <button type="submit" class="btn btn-info text-white">Submit</button>
            </div>
        </form>
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
<script>
    $(".role").validate({
        errorClass: "text-danger",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
            $(element).parent().addClass('has-danger');
            $(element).addClass('form-control-danger');
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
            $(element).parent().removeClass('has-danger');
            $(element).removeClass('form-control-danger');
            $(element).parent().addClass('has-success');
            $(element).addClass('form-control-success');
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element)
        }
    });
</script>
@endsection