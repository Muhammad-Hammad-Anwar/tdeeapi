<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('type') }}
        {{ Form::select('type', ['Main'=>'Main','More'=>'More','About'=>'About','Contact'=>'Contact','404'=>'404'], $menu->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('language') }}
        {{ Form::select('language_id', $languages, $menu->language_id, ['class' => 'form-control' . ($errors->has('language_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('language_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6 parent" style="display: none;">
        {{ Form::label('parent') }}
        {{ Form::select('parent_id', $parents, $menu->parent_id, ['class' => 'form-control' . ($errors->has('parent_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--']) }}
        {!! $errors->first('parent_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('title') }}
        {{ Form::text('title', $menu->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('url') }}
        {{ Form::text('url', $menu->url, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Url','required']) }}
        {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('order') }}
        {{ Form::number('order', $menu->order, ['class' => 'form-control' . ($errors->has('order') ? ' is-invalid' : ''), 'placeholder' => 'Order','min' => '1','required']) }}
        {!! $errors->first('order', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>