<div class="row">
    <div class="form-group col-md-6">
            {{ Form::label('topic') }}
            {{ Form::select('topic_id', $topics , $quiz->topic_id, ['class' => 'form-control' . ($errors->has('topic_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--', $quiz->topic_id ? 'disacled': 'required']) }}
            {!! $errors->first('topic_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('title') }}
        {{ Form::text('title', $quiz->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>