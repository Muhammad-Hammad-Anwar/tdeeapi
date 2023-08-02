<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

/**
 * Class CommentController
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:comments-list',  ['only' => ['index']]);
        $this->middleware('permission:comments-view',  ['only' => ['show']]);
        $this->middleware('permission:comments-create',['only' => ['create','store']]);
        $this->middleware('permission:comments-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:comments-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::whereNull('parent_id')->get();

        return view('admin.comment.index', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Comment::$rules);

        $comment = Comment::create($request->all());

        return redirect()->route('comments.index')
            ->with('success', 'Comment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        if (empty($comment->read_at)) {
            $comment->update(['read_at' => now()]);
        }

        return view('admin.comment.show', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());

        return redirect()->route('comments.index')
            ->with('success', 'Comment '.$request->status.' successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment->replyComments()->count() > 0) {
            $comment->replyComments()->delete();
        }
        $comment->delete();

        return redirect()->route('comments.index')
            ->with('success', 'Comment deleted successfully');
    }
}
