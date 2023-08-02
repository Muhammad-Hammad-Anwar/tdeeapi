<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Topic;
use Illuminate\Http\Request;

/**
 * Class QuizController
 * @package App\Http\Controllers
 */
class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:quiz-list',  ['only' => ['index']]);
        $this->middleware('permission:quiz-view',  ['only' => ['show']]);
        $this->middleware('permission:quiz-create',['only' => ['create','store']]);
        $this->middleware('permission:quiz-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:quiz-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::get();

        return view('admin.questionner.quiz.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quiz = new Quiz();
        $topics = Topic::pluck('title','id');

        return view('admin.questionner.quiz.create', compact('quiz','topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Quiz::$rules);

        $quiz = Quiz::create($request->all());

        return redirect()->route('quizzes.index')
            ->with('success', 'Quiz created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::find($id);

        return view('admin.questionner.quiz.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::find($id);
        $topics = Topic::pluck('title','id');

        return view('admin.questionner.quiz.edit', compact('quiz','topics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Quiz $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        request()->validate(Quiz::$rules);

        $quiz->update($request->all());

        return redirect()->route('quizzes.index')
            ->with('success', 'Quiz updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id)->delete();

        return redirect()->route('quizzes.index')
            ->with('success', 'Quiz deleted successfully');
    }
}
