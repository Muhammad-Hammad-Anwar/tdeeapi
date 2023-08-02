@extends('admin.layout.app')

@section('title','Settings')
    
@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Settings</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Settings</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Website General Settings</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('settings.save') }}" class="form-horizontal form-bordered" role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <div class="form-group row">
                    <label class="control-label text-end col-md-2">Website Header Logo</label>
                    <div class="col-md-4">
                        {{ Form::file('header_logo', ['class' => 'form-control', settings('header_logo') ? '' :'']) }}
                        <img src="{{ asset(settings('header_logo')) }}">
                    </div>
                    <label class="control-label text-end col-md-2">Website Footer Logo</label>
                    <div class="col-md-4">
                        {{ Form::file('footer_logo', ['class' => 'form-control', settings('footer_logo') ? '' :'']) }}
                        <img src="{{ asset(settings('footer_logo')) }}">
                    </div>
                    <label class="control-label mt-2 text-end col-md-2">Website Page Title Icon</label>
                    <div class="col-md-4 mt-2">
                        {{ Form::file('page_title_icon', ['class' => 'form-control', settings('page_title_icon') ? '' :'']) }}
                        <img src="{{ asset(settings('page_title_icon')) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label text-end col-md-2">Bazzigate Website Url</label>
                    <div class="col-md-4">
                        {{ Form::url('values[bazigate_website_url]', settings('bazigate_website_url'), ['class' => 'form-control']) }}
                    </div>
                    <label class="control-label mt-2 text-end col-md-2">Facebook Link</label>
                    <div class="col-md-4 mt-2">
                        {{ Form::url('values[facebook_link]', settings('facebook_link'), ['class' => 'form-control']) }}
                    </div>
                    <label class="control-label mt-2 text-end col-md-2">Twitter Link</label>
                    <div class="col-md-4 mt-2">
                        {{ Form::url('values[twitter_link]', settings('twitter_link'), ['class' => 'form-control']) }}
                    </div>
                    <label class="control-label  mt-2 text-end col-md-2">Instagram Link</label>
                    <div class="col-md-4 mt-2">
                        {{ Form::url('values[instagram_link]', settings('instagram_link'), ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label text-end col-md-2">App Store Link</label>
                    <div class="col-md-4">
                        {{ Form::url('values[app_store_link]', settings('app_store_link'), ['class' => 'form-control']) }}
                    </div>
                    <label class="control-label mt-2 text-end col-md-2">Play Store Link</label>
                    <div class="col-md-4 mt-2">
                        {{ Form::url('values[playstore_link]', settings('playstore_link'), ['class' => 'form-control']) }}
                    </div>
                    <label class="control-label mt-2 text-end col-md-2">Copyright Link</label>
                    <div class="col-md-4 mt-2">
                        {{ Form::url('values[copyright_link]', settings('copyright_link'), ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label text-end col-md-2">Google Search Console Code</label>
                    <div class="col-md-10">
                        {{ Form::textarea('values[google_search_console_code]', settings('google_search_console_code'), ['class' => 'form-control','rows'=>'4']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label text-end col-md-2">Google Analytics Code</label>
                    <div class="col-md-10">
                        {{ Form::textarea('values[google_analytics_code]', settings('google_analytics_code'), ['class' => 'form-control','rows'=>'4']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label text-end col-md-2">Clarity Code</label>
                    <div class="col-md-10">
                        {{ Form::textarea('values[clarity_code]', settings('clarity_code'), ['class' => 'form-control','rows'=>'4']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label text-end col-md-2">Nocaptcha Secret Key</label>
                    <div class="col-md-10">
                        {{ Form::text('values[nocaptcha_secret_key]', settings('nocaptcha_secret_key'), ['class' => 'form-control']) }}
                    </div>
                    <label class="control-label text-end col-md-2">Nocaptcha Site Key</label>
                    <div class="col-md-10">
                        {{ Form::text('values[nocaptcha_site_key]', settings('nocaptcha_site_key'), ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group row gy-3">
                    <label class="control-label text-end col-md-2">Job Application Message</label>
                    <div class="col-md-10">
                        {{ Form::text('values[job_application_message]', settings('job_application_message'), ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label text-end col-md-2">Contact Us Message</label>
                    <div class="col-md-10">
                        {{ Form::text('values[contact_us_message]', settings('contact_us_message'), ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label text-end col-md-2">Feadback Message</label>
                    <div class="col-md-10">
                        {{ Form::text('values[feadback_message]', settings('feadback_message'), ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label text-end col-md-2">Large Ads</label>
                <div class="col-md-10">
                    {{ Form::textarea('values[large_ads]', settings('large_ads'), ['class' => 'form-control','rows'=>'4']) }}
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label text-end col-md-2">Medium Ads</label>
                <div class="col-md-10">
                    {{ Form::textarea('values[medium_ads]', settings('medium_ads'), ['class' => 'form-control','rows'=>'4']) }}
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label text-end col-md-2">Small Ads</label>
                <div class="col-md-10">
                    {{ Form::textarea('values[small_ads]', settings('small_ads'), ['class' => 'form-control','rows'=>'4']) }}
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label text-end col-md-2">Long Ads</label>
                <div class="col-md-10">
                    {{ Form::textarea('values[long_ads]', settings('long_ads'), ['class' => 'form-control','rows'=>'4']) }}
                </div>
            </div>
            @can('settings-create')
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="offset-sm-3 col-md-9">
                                <button type="submit" class="btn btn-success text-white"> <i class="fa fa-check"></i> Submit</button>
                                <button type="button" class="btn btn-inverse">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
        </form>
    </div>
</div>
@endsection