<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\JobApplication;
use Illuminate\Http\Request;

/**
 * Class JobApplicationController
 * @package App\Http\Controllers
 */
class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:application-list',  ['only' => ['index']]);
        $this->middleware('permission:application-view',  ['only' => ['show']]);
        $this->middleware('permission:application-create',['only' => ['create','store']]);
        $this->middleware('permission:application-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:application-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobApplications = JobApplication::get();

        return view('admin.application.index', compact('jobApplications'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobApplication = JobApplication::find($id);

        return view('admin.application.show', compact('jobApplication'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $jobApplication = JobApplication::find($id)->delete();

        return redirect()->route('applications.index')
            ->with('success', 'JobApplication deleted successfully');
    }
}
