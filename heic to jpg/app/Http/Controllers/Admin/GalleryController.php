<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Image;

/**
 * Class GalleryController
 * @package App\Http\Controllers
 */
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:media-list',  ['only' => ['index']]);
        $this->middleware('permission:media-view',  ['only' => ['show']]);
        $this->middleware('permission:media-create',['only' => ['create','store']]);
        $this->middleware('permission:media-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:media-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::get();

        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if ($image = $request->file('image')) {
            $filenamewithextension = $image->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $filenametostore = 'upload/images/gallery/'.time().'_'.str_replace(' ', '_', $input['name']).'.webp';
            if ($request->x && $request->y) {
                $img = Image::make($image)->encode('webp', 90)->resize($request->x, $request->y);   
            }else{
                $img = Image::make($image)->encode('webp', 90);;
            }
            $img->save(public_path($filenametostore));
            $input['image'] = $filenametostore;
        }
        $gallery = Gallery::create($input);

        return redirect()->route('media.index')->with('success', 'Image uploaded successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id)->delete();

        return redirect()->route('media.index')->with('success', 'Image deleted successfully');
    }
}
