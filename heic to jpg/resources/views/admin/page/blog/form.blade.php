{{ Form::hidden('created_by', Auth::user()->id) }}
{{ Form::hidden('template', 'Blog') }}
{{ Form::hidden('x', '340') }}
{{ Form::hidden('y', '200') }}
<!-- Step 1 -->
<h6>General Info</h6>
<section>
    <div class="row">
        <div class="form-group col-md-6">
            {{ Form::label('language') }}
            {{ Form::select('language_id', languages(), $page->language_id, ['class' => 'form-control' . ($errors->has('language_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
            {!! $errors->first('language_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('category') }}
            {{ Form::select('parent_id', blogCategories(), $page->parent_id, ['class' => 'form-control' . ($errors->has('parent_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
            {!! $errors->first('parent_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('title') }}
            {{ Form::text('title', $page->title, ['class' => 'form-control page_name' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('slug') }}
            {{ Form::text('slug', $page->slug, ['class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'placeholder' => 'Slug','required']) }}
            {!! $errors->first('slug', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('canonical') }}
            {{ Form::text('canonical', $page->canonical, ['class' => 'form-control' . ($errors->has('canonical') ? ' is-invalid' : ''), 'placeholder' => 'Canonical']) }}
            {!! $errors->first('canonical', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('description') }}
            {{ Form::textarea('description', $page->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description','rows'=>'3']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</section>
<!-- Step 2 -->
<h6>Body</h6>
<section>
    <div class="row">
        <div class="form-group col-md-12">
            {{ Form::file('image', ['class' => 'dropify', 'id' => 'input-file-now-custom-2', 'data-height' => '400' . ($errors->has('image') ? ' is-invalid' : '')]) }}
            <img src="{{ asset($page->image) }}"/>
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('related pages') }}
            {{ Form::select('relatedPages[]', $relatedBlogs, '', ['class' => '', 'id' => 'public-methods' . ($errors->has('relatedPages') ? ' relatedPages' : ''), 'data-placeholder' => '--Select--','multiple']) }}
            {!! $errors->first('relatedPages', '<div class="invalid-feedback">:message</div>') !!}
            <div class="button-box m-t-20"> 
                <a id="select-all" class="btn btn-danger text-white" href="javascript:void(0)">Select All</a> 
                <a id="deselect-all" class="btn btn-info text-white" href="javascript:void(0)">Deselect All</a> 
            </div>
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('content') }}
            {{ Form::textarea('content', $page->content, ['class' => 'form-control','id' => 'textarea' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Add content Here...']) }}
            {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</section>
<!-- Step 3 -->
<h6>SEO</h6>
<section>
    <div class="row">
        <div class="form-group col-md-6">
            {{ Form::label('auther') }}
            {{ Form::select('auther_id', authers(), $page->auther_id, ['class' => 'form-control' . ($errors->has('auther_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
            {!! $errors->first('auther_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('metaTitle') }}
            {{ Form::text('metaTitle', $page->metaTitle, ['class' => 'form-control' . ($errors->has('metaTitle') ? ' is-invalid' : ''), 'placeholder' => 'Meta Title']) }}
            {!! $errors->first('metaTitle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('metaDescription') }}
            {{ Form::textarea('metaDescription', $page->metaDescription, ['class' => 'form-control' . ($errors->has('metaDescription') ? ' is-invalid' : ''), 'placeholder' => 'Meta Description', 'rows'=>'3']) }}
            {!! $errors->first('metaDescription', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('Open Graph Tags(OG Tags)') }}
            {{ Form::textarea('og_tags', $page->og_tags, ['class' => 'form-control' . ($errors->has('og_tags') ? ' is-invalid' : ''), 'placeholder' => 'OG Tags', 'rows'=>'5']) }}
            {!! $errors->first('og_tags', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('Schema Markup') }}
            {{ Form::textarea('schemas', $page->schemas, ['class' => 'form-control' . ($errors->has('schemas') ? ' is-invalid' : ''), 'placeholder' => 'Schema Markup', 'rows'=>'5']) }}
            {!! $errors->first('schemas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</section>