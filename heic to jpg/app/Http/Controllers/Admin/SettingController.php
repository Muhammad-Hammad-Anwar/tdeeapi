<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Setting;
use Artisan;
use Image;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:tool-list',  ['only' => ['index']]);
        $this->middleware('permission:tool-create',['only' => ['create','save']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.settings.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $data = array();
        if ($request->values) {
            foreach($_POST['values'] as $key => $value){
                $data[] = array(
                    'key'   => $key,
                    'value' => $value
                );
            }
        }
        foreach($request->file() as $key => $file){
            if ($image = $request->file($key)) 
            {
                $filenamewithextension = $image->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $filenametostore = 'upload/images/settings/'.$filename.'_'.time().'.webp';
                // $img = Image::make($image)->encode('webp', 90)->resize(100 , 200)->save(public_path($filenametostore));
                $img = Image::make($image)->encode('webp', 90)->save(public_path($filenametostore));
            }
            $data[] = array(
                'key'    => $key,
                'value'  => $filenametostore
            );
        }
        Setting::set($data);
        return redirect()->back()->with('success', 'Setting updated successfully.');
    }
}