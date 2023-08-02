@extends('admin.layout.app')

@section('title','Create Menu')

@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Create menu</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('menus.index') }}">Menu</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
            <a href="{{ route('menus.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
            </a>
        </div>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Create Menu</h4>
        <form method="POST" action="{{ route('menus.store') }}" role="form" enctype="multipart/form-data" class="menu">
            @csrf
            @include('admin.menu.form')
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(".menu").validate({
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
        },
    });
</script>
<script>
    $(document).ready(function() {
        $("select[name=type]").change(function() {
            if ($(this).val() == 'Main') {
                $('div.parent').show('slow');
            }else{
                $('div.parent').hide('slow');
            }
        }).trigger('change');
    });
</script>
@endsection