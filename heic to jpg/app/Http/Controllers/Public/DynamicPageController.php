<?php

namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\Feedback;
use App\Models\Comment;
use App\Models\Language;
use App\Models\Page;
use App\Models\Newsletter;

class DynamicPageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function viewHomePage()
    {
        $page = Page::where('template','Home')->where('language_id',1)->first();
        $slug = '';
        $language   = Language::find(1);
        $languages  = Language::where('id','!=', 1)->get();
        if ($page) {
            return view('public.index',compact('slug','page','language','languages'));   
        }
        return view('public.errors.404',compact('slug','page','language','languages'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewPage($slug1, $slug2 = null)
    {
        $checkLanguage = Language::where('code',$slug1)->first();
        /**
         * If home page with language
         */
        if ($checkLanguage && !isset($slug2)) {
            if ($checkLanguage->code == 'en') {
                return Redirect::to('/', 301);
            }
            $language = $checkLanguage;
            $languages= Language::where('id','!=', $language->id)->get();
            $slug     = '';
            $page     = Page::where([['template','Home'],['language_id',$language->id]])->first();
            if ($page) {
                return view('public.index',compact('slug','page','language','languages'));
            }return view('public.errors.404',compact('slug','page','language','languages'));
        }

        /**
         * If other than home page with language
         */
        elseif ($checkLanguage && isset($slug2)) {
            $language = $checkLanguage;
            if ($language->code == 'en') {
                return Redirect::to($slug2, 301);
            }
            $languages= Language::where('id','!=', $language->id)->get();
            $slug     = $slug2;
            $page     = Page::where([['slug',$slug2],['language_id',$language->id]])->first();
            if ($page) {
                return view('public.index',compact('slug','page','language','languages'));
            }return view('public.errors.404',compact('slug','page','language','languages'));
        }

        /**
         * If other than home page with out language
         */
        else{
            if (isset($slug1) && isset($slug2)) {
                return Redirect::to($slug2, 301);
            }
            $language = Language::find(1);
            $languages= Language::where('id','!=', $language->id)->get();
            $slug = $slug1;
            $page = Page::where([['slug',$slug1],['language_id',$language->id]])->first();
            if ($page) {
                if ($page->template == 'Home') {
                    return Redirect::to('/', 301);
                    return redirect()->route('home');
                }
                return view('public.index',compact('slug','page','language','languages'));
            }return view('public.errors.404',compact('slug','page','language','languages'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function jobApplicationStore(Request $request)
    {
        $request->validate([
            'career_id' => 'required',
            'name'      => 'required',
            'email'     => 'required',
            'attachment'=> "required|mimetypes:application/pdf|max:10000"
        ]);
        JobApplication::create($request->all());
        $parameters = ['jobApplicationMessage' => settings('job_application_message'),'application_id' => $request->career_id];
        return redirect()->back()->with($parameters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function feedbackStore(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required',
            'message' => "required"
        ]);
        Feedback::create($request->all());
        $parameters = ['feedbackMessage' => settings('feadback_message')];
        return redirect()->back()->with($parameters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function commentStore(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required',
            'message' => "required"
        ]);
        Comment::create($request->all());
        $parameters = ['commentMessage' => settings('comment_message')];
        return redirect()->back()->with($parameters);
    }
    public function newsletterStore(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required'
        ]);
        $name = $request->input('name');
        $email = $request->input('email');

        $subscriber = Newsletter::where('email')->first();
        if ($subscriber) {
            return redirect()->back()->with('error', 'You have already subscribed to our newsletter!');
        }

        Newsletter::create($request->all());
        
        Cookie::queue('newsletter_subscribed', true, 365);
        $parameters = ['newsletterMessage' => settings('newsletter_message')];
        return redirect()->back()->with($parameters);
    }
}
