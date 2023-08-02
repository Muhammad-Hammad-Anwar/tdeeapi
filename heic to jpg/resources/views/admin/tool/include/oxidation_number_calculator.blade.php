<form method="POST" action="{{ route('oxidation-number') }}" role="form" enctype="multipart/form-data" class="tool">
    @csrf
    <div class="row">
        <div class="form-group col-md-12">
            {{ Form::label('Enter Equation') }}
            {{ Form::text('equation', 'H2O', ['class' => 'form-control' . ($errors->has('equation') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
            {!! $errors->first('equation', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
