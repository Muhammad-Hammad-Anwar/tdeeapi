@extends('admin.layout.app')

@section('title','Gallery')

@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{ __('Gallery') }}</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ __('Gallery') }}</li>
            </ol>
            @can('media-create')
            <a data-bs-toggle="modal" data-bs-target="#addImage" type="button" class="btn btn-info d-none d-sm-block text-white m-l-15">
                <i class="fa fa-plus-circle"></i> Add Image
            </a>
            @endcan
        </div>
    </div>
@endsection
@section('content')
<div class="row el-element-overlay">
    @foreach ($galleries as $gallery)
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                        <img src="{{ asset($gallery->image) }}" style="height: 200px !important;"alt="user"/>
                        <div class="el-overlay">
                            <ul class="el-info">
                                @can('media-view')
                                <li>
                                    <a class="btn default btn-outline image-popup-vertical-fit" href="{{ asset($gallery->image) }}">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                @endcan
                                @can('media-delete')
                                <li>
                                    <form action="{{ route('media.destroy',$gallery->id) }}" method="POST" id="delete_{{ $gallery->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a href="{{ route('media.destroy', $gallery->id) }}" class="btn default btn-outline sa-confirm" onclick="event.preventDefault(); document.getElementById('delete_'+{{ $gallery->id }}).submit();">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </li>
                                @endcan
                                <li>
                                    <a class="btn default btn-outline"  href="{{ url($gallery->image) }}" onclick="copyUrl(event)" >
                                        <i class="ti-link"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="el-card-content">
                        <h4 class="box-title">{{ $gallery->title }}</h4>
                        <p>{{ $gallery->image }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div id="addImage" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('media.store') }}" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Upload Media Image</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    @include('admin.gallery.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary text-white">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<script>
    function copyUrl(event) {
    event.preventDefault();
    const url = event.currentTarget.href;
    navigator.clipboard.writeText(url).then(() => {
        console.log(`Copied URL: ${url}`);
    }, (err) => {
        console.error(`Failed to copy URL: ${err}`);
    });
    }
</script>