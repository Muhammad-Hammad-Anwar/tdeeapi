<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('quiz') }}
        {{ Form::select('quiz_id', $quizzes , $question->quiz_id, ['class' => 'form-control' . ($errors->has('quiz_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--', $question->quiz_id ? 'disacled': 'required']) }}
        {!! $errors->first('quiz_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('title') }}
        {{ Form::text('title', $question->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title', 'required']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('answer') }}
        {{ Form::text('answer', $question->answer, ['class' => 'form-control' . ($errors->has('answer') ? ' is-invalid' : ''), 'placeholder' => 'Answer', 'required']) }}
        {!! $errors->first('answer', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('hint') }}
        {{ Form::text('hint', $question->hint, ['class' => 'form-control' . ($errors->has('hint') ? ' is-invalid' : ''), 'placeholder' => 'Hint', 'required']) }}
        {!! $errors->first('hint', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('options') }}
        {{ Form::textarea('options', implode(',',$question->options), ['class' => 'form-control' . ($errors->has('options') ? ' options' : ''), 'placeholder' => 'Comma Seperated', 'required','rows'=>'4']) }}
        {!! $errors->first('options', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
