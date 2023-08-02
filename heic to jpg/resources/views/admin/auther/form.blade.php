<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('name') }}
        {{ Form::text('name', $auther->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('image') }}
        {{ Form::file('image', ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Image', $auther->image ? '': 'required']) }}
        {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('bio') }}
        {{ Form::textarea('bio', $auther->bio, ['class' => 'form-control' . ($errors->has('bio') ? ' is-invalid' : ''), 'placeholder' => 'Bio','required','rows'=>'3']) }}
        {!! $errors->first('bio', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>