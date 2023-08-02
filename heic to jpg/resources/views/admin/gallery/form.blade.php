<div class="row">
    <div class="form-group col-lg-12">
        {{ Form::label('title') }}
        {{ Form::text('title', '', ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-12">
        {{ Form::label('image name') }}
        {{ Form::text('name', '', ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Image Name','required']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-12">
        {{ Form::label('image') }}
        {{ Form::file('image', ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Image','required','accept'=> 'image/png,image/jpg,image/jpeg']) }}
        {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6">
        {{ Form::label('width') }}
        {{ Form::number('x', '',['class' => 'form-control' . ($errors->has('x') ? ' is-invalid' : ''), 'placeholder' => 'Width','min'=>'1','max'=>'1900']) }}
        {!! $errors->first('x', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6">
        {{ Form::label('height') }}
        {{ Form::number('y', '',['class' => 'form-control' . ($errors->has('y') ? ' is-invalid' : ''), 'placeholder' => 'Height','min'=>'1','max'=>'1000']) }}
        {!! $errors->first('y', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>