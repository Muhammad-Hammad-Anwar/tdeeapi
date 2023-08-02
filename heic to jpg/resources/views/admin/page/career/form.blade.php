{{ Form::hidden('created_by', Auth::user()->id) }}
{{ Form::hidden('template', 'Career') }}
{{ Form::hidden('language_id', '1') }}
<!-- Step 1 -->
<h6>General Info</h6>
<section>
    <div class="row">
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
    </div>
</section>
<!-- Step 2 -->
<h6>Body</h6>
<section>
    <div class="row">
        <div class="form-group col-md-12">
            {{ Form::label('description') }}
            {{ Form::textarea('description', $page->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description','rows'=>'3']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</section>
<!-- Step 3 -->
<h6>SEO</h6>
<section>
    <div class="row">
        <div class="form-group col-md-12">
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