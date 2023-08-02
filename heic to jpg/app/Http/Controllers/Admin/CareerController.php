<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Career;
use Illuminate\Http\Request;

/**
 * Class CareerController
 * @package App\Http\Controllers
 */
class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:career-list',  ['only' => ['index']]);
        $this->middleware('permission:career-view',  ['only' => ['show']]);
        $this->middleware('permission:career-create',['only' => ['create','store']]);
        $this->middleware('permission:career-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:career-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = Career::get();

        return view('admin.career.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $career = new Career();
        return view('admin.career.create', compact('career'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $career = Career::create($request->all());

        return redirect()->route('careers.index')->with('success', 'Career created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $career = Career::find($id);

        return view('admin.career.show', compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $career = Career::find($id);

        return view('admin.career.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Career $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        request()->validate(Career::$rules);

        $career->update($request->all());

        return redirect()->route('careers.index')->with('success', 'Career updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $career = Career::find($id)->delete();
        
        return redirect()->route('careers.index')->with('success', 'Career deleted successfully');
    }
}
