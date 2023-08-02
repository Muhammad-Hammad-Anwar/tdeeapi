<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('name') }}
        {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6">
        {{ Form::label('email') }}
        {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email','required']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6">
        {{ Form::label('password') }}
        {{ Form::password('password',  ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password','id'=>'password']) }}
        {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6">
        {{ Form::label('confirm_password') }}
        {{ Form::password('confirm_password', ['class' => 'form-control' . ($errors->has('confirm_password') ? ' is-invalid' : ''), 'placeholder' => 'Confirm Password']) }}
        {!! $errors->first('confirm_password', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-12">
        {{ Form::label('roles') }}
        {{ Form::select('roles[]', $roles, $user->roles, ['class' => 'form-control select2 m-b-10 select2-multiple' . ($errors->has('roles') ? ' is-invalid' : ''), 'data-placeholder' => '--Select--','multiple','required']) }}
        {!! $errors->first('roles', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="row">
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
    