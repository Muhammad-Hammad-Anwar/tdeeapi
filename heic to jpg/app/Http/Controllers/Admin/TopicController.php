<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Topic;
use Illuminate\Http\Request;

/**
 * Class TopicController
 * @package App\Http\Controllers
 */
class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:topic-list',  ['only' => ['index']]);
        $this->middleware('permission:topic-view',  ['only' => ['show']]);
        $this->middleware('permission:topic-create',['only' => ['create','store']]);
        $this->middleware('permission:topic-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:topic-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::get();

        return view('admin.questionner.topic.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic = new Topic();
        return view('admin.questionner.topic.create', compact('topic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Topic::$rules);

        $topic = Topic::create($request->all());

        return redirect()->route('topics.index')
            ->with('success', 'Topic created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::find($id);

        return view('admin.questionner.topic.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::find($id);

        return view('admin.questionner.topic.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        request()->validate(Topic::$rules);

        $topic->update($request->all());

        return redirect()->route('topics.index')
            ->with('success', 'Topic updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $topic = Topic::find($id)->delete();

        return redirect()->route('topics.index')
            ->with('success', 'Topic deleted successfully');
    }
}
