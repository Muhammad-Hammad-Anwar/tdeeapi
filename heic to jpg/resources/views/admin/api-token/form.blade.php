<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('code') }}
        {{ Form::text('code', $apiToken->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Code','required']) }}
        {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('limit') }}
        {{ Form::number('limit', $apiToken->limit, ['class' => 'form-control' . ($errors->has('limit') ? ' is-invalid' : ''), 'placeholder' => 'Limit','required','min'=>'0']) }}
        {!! $errors->first('limit', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('web_utilize') }}
        {{ Form::number('web_utilize', $apiToken->web_utilize, ['class' => 'form-control' . ($errors->has('web_utilize') ? ' is-invalid' : ''), 'placeholder' => 'Web Utilize','required','min'=>'0']) }}
        {!! $errors->first('web_utilize', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('app_utilize') }}
        {{ Form::number('app_utilize', $apiToken->app_utilize, ['class' => 'form-control' . ($errors->has('app_utilize') ? ' is-invalid' : ''), 'placeholder' => 'App Utilize','required','min'=>'0']) }}
        {!! $errors->first('app_utilize', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>