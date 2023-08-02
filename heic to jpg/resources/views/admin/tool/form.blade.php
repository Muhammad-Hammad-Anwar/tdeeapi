<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('title') }}
        {{ Form::text('title', $tool->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('blade') }}
        {{ Form::text('blade', $tool->blade, ['class' => 'form-control' . ($errors->has('blade') ? ' is-invalid' : ''), 'placeholder' => 'Blade','required']) }}
        {!! $errors->first('blade', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('examples') }}
        {{ Form::textarea('examples', implode(',',$tool->examples), ['class' => 'form-control' . ($errors->has('blade') ? ' is-invalid' : ''), 'placeholder' => 'Comma Seperated','rows'=>'3']) }}
        {!! $errors->first('blade', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>