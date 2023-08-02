@extends('admin.layout.app')

@section('title','Dashboard')
    
@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Dashboard</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="d-flex flex-row">
                <div class="p-10 bg-info">
                    <h3 class="text-white box m-b-0"><i class="fas fa-users"></i></h3>
                </div>
                <div class="align-self-center m-l-20">
                    <h3 class="m-b-0">50</h3>
                    <h5 class="text-muted m-b-0">Users</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="d-flex flex-row">
                <div class="p-10 bg-success">
                    <h3 class="text-white box m-b-0"><i class="icon-people"></i></h3>
                </div>
                <div class="align-self-center m-l-20">
                    <h3 class="m-b-0">5</h3>
                    <h5 class="text-muted m-b-0">Authors</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="d-flex flex-row">
                <div class="p-10 bg-danger">
                    <h3 class="text-white box m-b-0"><i class="icons-Wrench"></i></h3>
                </div>
                <div class="align-self-center m-l-20">
                    <h3 class="m-b-0">30</h3>
                    <h5 class="text-muted m-b-0">Tools</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="d-flex flex-row">
                <div class="p-10 bg-primary">
                    <h3 class="text-white box m-b-0"><i class="icons-Camera-2"></i></h3>
                </div>
                <div class="align-self-center m-l-20">
                    <h3 class="m-b-0">100</h3>
                    <h5 class="text-muted m-b-0">Media</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-self-center">
                    <div>
                    <h3 class="card-title">API Token</h3>
                    <h6 class="card-subtitle">you can check the Token</h6>
                    </div>
                    <div class="ms-auto">    
                    <ul class="list-inline">
                        <li>
                            <h6 class="text-muted"><i class="fa fa-circle m-r-5 text-success"></i>Free</h6> </li>
                        <li>
                            <h6 class="text-muted"><i class="fa fa-circle m-r-5 text-primary"></i>Premium</h6> </li>
                    </ul>
                    </div> 
                </div>
                <div class="download-state chartist-chart" style="height:300px"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="d-flex flex-row">
                <div class="p-10 bg-megna">
                    <h3 class="text-white box m-b-0"><i class="icons-Map"></i></h3>
                </div>
                <div class="align-self-center m-l-20">
                    <h3 class="m-b-0">5</h3>
                    <h5 class="text-muted m-b-0">Languages</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="d-flex flex-row">
                <div class="p-10 bg-primary">
                    <h3 class="text-white box m-b-0"><i class="icons-Data-Save"></i></h3>
                </div>
                <div class="align-self-center m-l-20">
                    <h3 class="m-b-0">20</h3>
                    <h5 class="text-muted m-b-0">Applications</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="d-flex flex-row">
                <div class="p-10 bg-warning">
                    <h3 class="text-white box m-b-0"><i class="icons-Books"></i></h3>
                </div>
                <div class="align-self-center m-l-20">
                    <h3 class="m-b-0">10</h3>
                    <h5 class="text-muted m-b-0">Blogs</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="d-flex flex-row">
                <div class="p-10 bg-megna">
                    <h3 class="text-white box m-b-0"><i class="fas fa-comments"></i></h3>
                </div>
                <div class="align-self-center m-l-20">
                    <h3 class="m-b-0">30</h3>
                    <h5 class="text-muted m-b-0">Comments</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="d-flex flex-row">
                <div class="p-10 bg-warning">
                    <h3 class="text-white box m-b-0"><i class=" ti-help-alt"></i></h3>
                </div>
                <div class="align-self-center m-l-20">
                    <h3 class="m-b-0">7</h3>
                    <h5 class="text-muted m-b-0">Quiz</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="d-flex flex-row">
                <div class="p-10 bg-danger">
                    <h3 class="text-white box m-b-0"><i class="icons-Envelope"></i></h3>
                </div>
                <div class="align-self-center m-l-20">
                    <h3 class="m-b-0">50</h3>
                    <h5 class="text-muted m-b-0">Feedbacks</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="d-flex flex-row">
                <div class="p-10 bg-success">
                    <h3 class="text-white box m-b-0"><i class="ti-settings"></i></h3>
                </div>
                <div class="align-self-center m-l-20">
                    <h5 class="text-muted m-b-0">Settings</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
