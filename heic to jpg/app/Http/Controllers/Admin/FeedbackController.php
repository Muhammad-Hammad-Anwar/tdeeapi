<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Feedback;
use Illuminate\Http\Request;

/**
 * Class FeedbackController
 * @package App\Http\Controllers
 */
class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:feedback-list',  ['only' => ['index']]);
        $this->middleware('permission:feedback-view',  ['only' => ['show']]);
        $this->middleware('permission:feedback-create',['only' => ['create','store']]);
        $this->middleware('permission:feedback-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:feedback-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::get();

        return view('admin.feedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feedback = new Feedback();
        return view('admin.feedback.create', compact('feedback'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Feedback::$rules);

        $feedback = Feedback::create($request->all());

        return redirect()->route('feedbacks.index')
            ->with('success', 'Feedback created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = Feedback::find($id);

        return view('admin.feedback.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedback::find($id);

        return view('admin.feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        request()->validate(Feedback::$rules);

        $feedback->update($request->all());

        return redirect()->route('feedbacks.index')
            ->with('success', 'Feedback updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $feedback = Feedback::find($id)->delete();

        return redirect()->route('feedbacks.index')
            ->with('success', 'Feedback deleted successfully');
    }
}
