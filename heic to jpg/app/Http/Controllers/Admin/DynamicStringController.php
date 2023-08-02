<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\DynamicString;
use App\Models\Language;
use Illuminate\Http\Request;

/**
 * Class DynamicStringController
 * @package App\Http\Controllers
 */
class DynamicStringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:strings-list',  ['only' => ['index']]);
        $this->middleware('permission:strings-view',  ['only' => ['show']]);
        $this->middleware('permission:strings-create',['only' => ['create','store']]);
        $this->middleware('permission:strings-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:strings-delete',['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dynamicStrings = DynamicString::orderBy('key')->get();

        return view('admin.string.index', compact('dynamicStrings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dynamicString = new DynamicString();
        $languages  = Language::pluck('name','id');

        return view('admin.string.create', compact('dynamicString','languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DynamicString::$rules);

        $dynamicString = DynamicString::create($request->all());

        return redirect()->route('dynamic-strings.index')->with('success', 'String created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dynamicString = DynamicString::find($id);

        return view('admin.string.show', compact('dynamicString'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dynamicString = DynamicString::find($id);
        $languages  = Language::pluck('name','id');

        return view('admin.string.edit', compact('dynamicString','languages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function addLanguage($id)
    {
        $dynamicString = DynamicString::find($id);
        $ids = DynamicString::where('key',$dynamicString->key)->pluck('language_id')->toArray();
        $languages  = Language::whereNotIn('id',$ids)->pluck('name','id');

        return view('admin.string.add', compact('dynamicString','languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DynamicString $dynamicString
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DynamicString $dynamicString)
    {
        $dynamicString->update($request->all());

        return redirect()->route('dynamic-strings.index')->with('success', 'String updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dynamicString = DynamicString::find($id)->delete();

        return redirect()->route('dynamic-strings.index')->with('success', 'String deleted successfully');
    }

    /**
     * Validate a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkKey(Request $request)
    {
        $string = DynamicString::where('language_id',$request->language_id)->where('key', $request->key)->first();
        if($string){ echo "false"; }else{ echo "true";}
    }
}
