@extends('admin.layout.app')

@section('title','Show Auther')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Show Auther</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('authers.index') }}">Auther</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
        <a href="{{ route('authers.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
        </a>
        <a data-bs-toggle="modal" data-bs-target="#addLink" type="button" class="btn btn-info d-none d-sm-block text-white m-l-15">
            <i class="fa fa-plus-circle"></i> Add Link
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="{{ asset($auther->image) }}" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10">{{ $auther->name }}</h4>
                </center>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">Bio</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">Social Links</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="card-body">
                    <p class="text-muted">{{ $auther->bio }}</p>
                    </div>
                </div>
                <div class="tab-pane" id="profile" role="tabpanel">
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table color-table info-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($auther->socialLinks as  $key => $link)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $link->type }}</td>
                                        <td>{{ $link->link }}</td>
                                        <td>
                                            <form action="{{ route('author.link.destroy', $link->id)}}" method="POST" role="form" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" id="sa-confirm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="addLink" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Social Links</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('author.link.store')}}" role="form" enctype="multipart/form-data">
                    @csrf
                    {{ Form::hidden('auther_id', $auther->id ) }}
                    <div class="row">
                        <div class="form-group col-md-12">
                            {{ Form::label('Select type') }}
                            {{ Form::select('type', ['fa-facebook-f' => 'Facebook','fa-twitter'=> 'Twitter','fa-youtube' => 'Youtube','fa-tiktok' => 'Tiktok', 'fa-instagram'=> 'Instagram','fa-linkedin' => 'Linkedin' ,'fa-pinterest'=> 'Pinterest'], '',['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''),'placeholder'=>'--Select--']) }}
                            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('link') }}
                            {{ Form::url('link', '', ['class' => 'form-control' . ($errors->has('link') ? ' is-invalid' : ''), 'placeholder' => 'Link']) }}
                            {!! $errors->first('link', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="box-footer mt20 d-flex justify-content-between">
                            <button type="button" class="btn btn-info waves-effect text-white" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
