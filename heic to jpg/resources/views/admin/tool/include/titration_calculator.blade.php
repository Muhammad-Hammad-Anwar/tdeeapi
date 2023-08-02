<form method="POST" action="{{ route('titration') }}" role="form" enctype="multipart/form-data" class="tool">
    @csrf
    <div class="row">
        <div class="form-group col-md-12">
            {{ Form::label('Mass') }}
            {{ Form::text('MathInput', '', ['class' => 'form-control' . ($errors->has('MathInput') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
            {!! $errors->first('MathInput', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('Select Unit') }}
            {{ Form::select('variable', ['Gram' =>'Gram', 'Miligram' => 'Miligram','Microgram' => 'Microgram'], 'x',['class' => 'form-control' . ($errors->has('variable') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
            {!! $errors->first('variable', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('Molecular Weight') }}
            {{ Form::text('MathInput', '', ['class' => 'form-control' . ($errors->has('MathInput') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
            {!! $errors->first('MathInput', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('Moles') }}
            {{ Form::text('MathInput', '', ['class' => 'form-control' . ($errors->has('MathInput') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
            {!! $errors->first('MathInput', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>