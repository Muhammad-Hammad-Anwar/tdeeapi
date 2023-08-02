<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

/**
 * Class ToolController
 * @package App\Http\Controllers
 */
class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:tool-list',  ['only' => ['index']]);
        $this->middleware('permission:tool-view',  ['only' => ['show']]);
        $this->middleware('permission:tool-create',['only' => ['create','store']]);
        $this->middleware('permission:tool-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:tool-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tools = Tool::get();
 
        return view('admin.tool.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tool = new Tool();
        return view('admin.tool.create', compact('tool'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tool::$rules);

        $tool = Tool::create($request->all());

        return redirect()->route('tools.index')
            ->with('success', 'Tool created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tool = Tool::find($id);

        return view('admin.tool.show', compact('tool'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tool = Tool::find($id);

        return view('admin.tool.edit', compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tool $tool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tool $tool)
    {
        request()->validate(Tool::$rules);

        $tool->update($request->all());

        return redirect()->route('tools.index')
            ->with('success', 'Tool updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tool = Tool::find($id)->delete();

        return redirect()->route('tools.index')
            ->with('success', 'Tool deleted successfully');
    }
}
