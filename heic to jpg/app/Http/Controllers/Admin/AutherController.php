<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\AutherLink;
use App\Models\Auther;
use Illuminate\Http\Request;

/**
 * Class AutherController
 * @package App\Http\Controllers
 */
class AutherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:auther-list',  ['only' => ['index']]);
        $this->middleware('permission:auther-view',  ['only' => ['show']]);
        $this->middleware('permission:auther-create',['only' => ['create','store']]);
        $this->middleware('permission:auther-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:auther-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authers = Auther::get();

        return view('admin.auther.index', compact('authers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auther = new Auther();
        return view('admin.auther.create', compact('auther'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Auther::$rules);
        $auther = Auther::create($request->all());
        return redirect()->route('authers.index')->with('success', 'Auther created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auther = Auther::find($id);
        return view('admin.auther.show', compact('auther'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auther = Auther::find($id);
        return view('admin.auther.edit', compact('auther'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Auther $auther
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auther $auther)
    {
        request()->validate(Auther::$rules);

        $auther->update($request->all());

        return redirect()->route('authers.index')->with('success', 'Auther updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $auther = Auther::find($id)->delete();
        return redirect()->route('authers.index')->with('success', 'Auther deleted successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeLink(Request $request)
    {
        $links = AutherLink::create($request->all());
        return redirect()->back()->with('success', 'Auther link created successfully');
    }
    
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function deleteLink($id)
    {
        $links = AutherLink::find($id)->delete();
        return redirect()->back()->with('success', 'Auther link deleted successfully');
    }
}
