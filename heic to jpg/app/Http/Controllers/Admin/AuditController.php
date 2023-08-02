<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:audit-list',  ['only' => ['index']]);
        $this->middleware('permission:audit-view',  ['only' => ['show']]);
        $this->middleware('permission:audit-create',['only' => ['create','store']]);
        $this->middleware('permission:audit-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:audit-delete',['only' => ['destroy']]);
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audits = Audit::with('user')->orderBy('created_at', 'desc')->get();

	    return view('admin.audit.index', compact('audits'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $audit = Audit::find($id);

        return view('admin.audit.show', compact('audit'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $audit = Audit::find($id)->delete();

        return redirect()->route('audit.index')
            ->with('success', 'Audit deleted successfully');
    }
}
