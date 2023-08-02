<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

/**
 * Class LanguageController
 * @package App\Http\Controllers
 */
class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:language-list',  ['only' => ['index']]);
        $this->middleware('permission:language-view',  ['only' => ['show']]);
        $this->middleware('permission:language-create',['only' => ['create','store']]);
        $this->middleware('permission:language-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:language-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::get();

        return view('admin.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = new Language();
        return view('admin.language.create', compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Language::$rules);

        $language = Language::create($request->all());

        return redirect()->route('languages.index')
            ->with('success', 'Language created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language = Language::find($id);

        return view('admin.language.show', compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = Language::find($id);

        return view('admin.language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Language $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $language->update($request->all());

        return redirect()->route('languages.index')
            ->with('success', 'Language updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $language = Language::find($id)->delete();

        return redirect()->route('languages.index')
            ->with('success', 'Language deleted successfully');
    }

    /**
     * Validate a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkCode(Request $request)
    {
        if ($request->id) {
            $language = Language::where('id','!=',$request->id)->where('code', $request->code)->first(); 
        }else{
            $language = Language::where('code', $request->code)->first();
        }
        if($language){ echo "false"; }else{ echo "true";}
    }
}
