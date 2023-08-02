<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('title') }}
        {{ Form::text('title', $career->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('type') }}
        {{ Form::select('type', ['On-site' => 'On-site','Remote' => 'Remote','Hybrid' => 'Hybrid'],$career->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => '--Select--']) }}
        {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('order') }}
        {{ Form::number('order', $career->order, ['class' => 'form-control' . ($errors->has('order') ? ' is-invalid' : ''), 'placeholder' => 'Order','min'=>'1','max'=>'100']) }}
        {!! $errors->first('order', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    @if($career->status)
    <div class="form-group col-md-6">
        {{ Form::label('status') }}
        {{ Form::select('status',['Publish' => 'Publish','UnPublish' =>'UnPublish'], $career->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => '--Select--']) }}
        {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    @endif
    <div class="form-group col-md-12">
        {{ Form::label('description') }}
        {{ Form::textarea('description', $career->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description','rows'=>'2']) }}
        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('detail') }}
        {{ Form::textarea('detail', $career->detail, ['class' => 'form-control textarea','id' => 'textarea' . ($errors->has('detail') ? ' is-invalid' : ''), 'placeholder' => 'Detail']) }}
        {!! $errors->first('detail', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>