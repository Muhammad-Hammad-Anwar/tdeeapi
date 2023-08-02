<form method="POST" action="{{ route('percent-yield') }}" role="form" enctype="multipart/form-data" class="tool">
    @csrf
    <div class="row">
        <div class="form-group col-md-6">
            {{ Form::label('Theoretical Yield') }}
            {{ Form::text('MathInput', '', ['class' => 'form-control' . ($errors->has('MathInput') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
            {!! $errors->first('MathInput', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('Actual Yield') }}
            {{ Form::text('MathInput', '', ['class' => 'form-control' . ($errors->has('MathInput') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
            {!! $errors->first('MathInput', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
