<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\ApiToken;
use Illuminate\Http\Request;

/**
 * Class ApiTokenController
 * @package App\Http\Controllers
 */
class ApiTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:apiToken-list',  ['only' => ['index']]);
        $this->middleware('permission:apiToken-view',  ['only' => ['show']]);
        $this->middleware('permission:apiToken-create',['only' => ['create','store']]);
        $this->middleware('permission:apiToken-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:apiToken-delete',['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apiTokens = ApiToken::get();

        return view('admin.api-token.index', compact('apiTokens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apiToken = new ApiToken();
        return view('admin.api-token.create', compact('apiToken'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ApiToken::$rules);

        $apiToken = ApiToken::create($request->all());

        return redirect()->route('api-tokens.index')
            ->with('success', 'ApiToken created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apiToken = ApiToken::find($id);

        return view('admin.api-token.show', compact('apiToken'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apiToken = ApiToken::find($id);

        return view('admin.api-token.edit', compact('apiToken'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ApiToken $apiToken
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApiToken $apiToken)
    {
        request()->validate(ApiToken::$rules);

        $apiToken->update($request->all());

        return redirect()->route('api-tokens.index')
            ->with('success', 'ApiToken updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $apiToken = ApiToken::find($id)->delete();

        return redirect()->route('api-tokens.index')
            ->with('success', 'ApiToken deleted successfully');
    }
}
