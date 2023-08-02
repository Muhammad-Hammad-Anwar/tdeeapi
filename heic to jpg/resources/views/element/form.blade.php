<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('element') }}
            {{ Form::text('element', $element->element, ['class' => 'form-control' . ($errors->has('element') ? ' is-invalid' : ''), 'placeholder' => 'Element']) }}
            {!! $errors->first('element', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('atomicmass') }}
            {{ Form::text('atomicmass', $element->atomicmass, ['class' => 'form-control' . ($errors->has('atomicmass') ? ' is-invalid' : ''), 'placeholder' => 'Atomicmass']) }}
            {!! $errors->first('atomicmass', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>