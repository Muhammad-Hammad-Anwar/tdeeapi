<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

/**
 * Class QuestionController
 * @package App\Http\Controllers
 */
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:question-list',  ['only' => ['index']]);
        $this->middleware('permission:question-view',  ['only' => ['show']]);
        $this->middleware('permission:question-create',['only' => ['create','store']]);
        $this->middleware('permission:question-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:question-delete',['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::get();

        return view('admin.questionner.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question();
        $quizzes = Quiz::pluck('title','id');
        return view('admin.questionner.question.create', compact('question','quizzes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Question::$rules);

        $question = Question::create($request->all());

        return redirect()->route('questions.index')
            ->with('success', 'Question created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);

        return view('admin.questionner.question.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $quizzes = Quiz::pluck('title','id');
        return view('admin.questionner.question.edit', compact('question','quizzes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Question $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        request()->validate(Question::$rules);

        $question->update($request->all());

        return redirect()->route('questions.index')
            ->with('success', 'Question updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $question = Question::find($id)->delete();

        return redirect()->route('questions.index')
            ->with('success', 'Question deleted successfully');
    }
}
