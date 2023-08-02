@extends('admin.layout.app')

@section('title','Show menu')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Show Menu</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('menus.index') }}">Menu</a></li>
            <li class="breadcrumb-item active">Show</li>
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
        <h4 class="card-title">Show Menu</h4>
        <table class="table no-border d-flex">
            <tbody>
                <tr>
                    <td class="card-title">Type</td>
                    <td>{{ $menu->type }}</td>
                </tr>
                <tr>
                    <td class="card-title">Language</td>
                    <td>{{ $menu->language->name }}</td>
                </tr>
                <tr>
                    <td class="card-title">Title</td>
                    <td>{{ $menu->title }}</td>
                </tr>
                <tr>
                    <td class="card-title">Url</td>
                    <td>{{ $menu->url }}</td>
                </tr>
                <tr>
                    <td class="card-title">Order</td>
                    <td>{{ $menu->order }}</td>
                </tr>
                @if($menu->childs)
                <tr>
                    <td class="card-title">Childs</td>
                    <td>
                        <table class="datatable table table-striped border">
                            <thead>
                                <tr>
                                    <th>Language</th>
                                    <th>Title</th>
                                    <th>URL</th>
                                    <th>Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menu->childItems as $key => $child)
                                    <tr>
                                        <td>{{ $child->language->name }}</td>
                                        <td>{{ $child->title }}</td>
                                        <td>{{ $child->url }}</td>
                                        <td>{{ $child->order }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
