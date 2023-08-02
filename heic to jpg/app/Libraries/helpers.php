<?php

use App\Models\Language;
use App\Models\Auther;
use App\Models\Page;
use App\Models\Menu;
use App\Models\Career;
use App\Models\Tool;
use App\Models\ApiToken;
use App\Models\Setting;
use App\Models\DynamicString;

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function languages()
{
    return Language::pluck('name','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function authers()
{
    return Auther::pluck('name','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function toolCategories()
{
    return Page::where([['template','Category'],['category_type','Tool']])->pluck('title','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function blogCategories()
{
    return Page::where([['template','Category'],['category_type','Blog']])->pluck('title','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function problemCategories()
{
    return Page::where([['template','Category'],['category_type','Problem']])->pluck('title','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function tools()
{
    return Tool::pluck('title','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function careers()
{
    return Career::where('status','Publish')->orderBy('order','asc')->get();
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function toolPages($lang)
{
    return Page::whereIn('template',['Tool','Home'])->where('language_id',$lang)->get();
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function hreflang($slug)
{
    $ids = Page::where('slug',$slug)->pluck('language_id');
    return Language::whereIn('id',$ids)->get();
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function langPages($slug, $lang)
{
    if (!empty($slug)) {
        $ids = Page::where('slug',$slug)->where('language_id','!=',$lang)->pluck('language_id');    
    }else{
        $ids = Page::where('template','Home')->where('language_id','!=',$lang)->pluck('language_id');
    }
    
    return Language::whereIn('id',$ids)->get();
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function urlGenerate($slug, $lang)
{
    if ($lang == 1) {
        $url = $slug;
    }else{
        $language = Language::find($lang);
        $url = $language->code .'/'. $slug;
    }
    return $url;
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function settings($key)
{
    return Setting::get($key);
}

/**
 * Get result of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function dynamicString($key,$lang)
{
    $checkRecord = DynamicString::where([['key',$key],['language_id',$lang]])->first();
    if ($checkRecord) {
        $value = $checkRecord->value;
    }
    else{
        $default = DynamicString::where([['key',$key],['language_id',1]])->first();
        $default ? $value = $default->value : $value = '';
    }
    return $value;
}

/**
 * Get responce from a third party API resource.
 *
 * @return \Illuminate\Http\Response
 */
function getApiTokenIds()
{
    $ids = array();
    foreach (ApiToken::get() as $token) {
        if ($token->limit > ($token->web_utilize + $token->app_utilize)) { $ids[] = $token->id; }
    } return $ids;
}

/**
 * Get responce from a third party API resource.
 *
 * @return \Illuminate\Http\Response
 */
function wolframalphaAPI($equation)
{
    $token = ApiToken::whereIn('id',getApiTokenIds())->inRandomOrder()->first();
    $equation = urlencode($equation);
    $response = Http::get("http://api.wolframalpha.com/v2/query?appid=". $token->code ."&input=" . $equation . "&output=json&podstate=Step-by-step+solution&podstate=Step-by-step&podstate=Show+all+steps");
    $token->increment('web_utilize');
    $result = $response->json();
    return $result['queryresult']['pods'];
}

/**
 * Get responce from a other API resource.
 *
 * @return \Illuminate\Http\Response
 */
function sympyStepAPI($variable, $equation)
{
    $responce = file_get_contents_curl("http://sympy.calculatored.com/card/intsteps?variable=" . $variable . "&expression=" . $equation);
    $responce = stripcslashes($responce);
    $responce = substr($responce, strpos($responce, "output") + 10);
    $responce = Str::replaceLast('"}', '', $responce);
    return $responce;
}

/**
 * Get responce from a other API resource.
 *
 * @return \Illuminate\Http\Response
 */
function sympyAnswerAPI($variable, $equation)
{
    $answer = file_get_contents_curl("http://sympy.calculatored.com/card/integral_alternate_fake?variable=" . $variable . "&expression=" . $equation);
    $getanswer = json_decode($answer, true);
    $responce = explode(',', $getanswer['value']);
    return $responce;
}

/**
 * Get responce from a other API resource.
 *
 * @return \Illuminate\Http\Response
 */
function sympyApproximatorAPI($variable, $expression, $digits)
{
    $responce = file_get_contents_curl("https://sympy.calculatored.com/card/approximator?variable=" . $variable . "&expression=" . $expression . "&digits=" . $digits);
    $responce = json_decode($responce, true);
    return $responce['output'];
}

/**
 * Get HTML of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function file_get_contents_curl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
function atomic_weights()
{
    $atomicWeights = [
        "H" => 1.0079,
        "He" => 4.0026,
        "Li" => 6.941,
        "Be" => 9.0122,
        "B" => 10.811,
        "C" => 12.0107,
        "N" => 14.0067,
        "O" => 15.9994,
        "F" => 18.9984,
        "Ne" => 20.1797,
        "Na" => 22.9897,
        "Mg" => 24.305,
        "Al" => 26.9815,
        "Si" => 28.0855,
        "P" => 30.9738,
        "S" => 32.065,
        "Cl" => 35.453,
        "Ar" => 39.948,
        "K" => 39.0983,
        "Ca" => 40.078,
        "Sc" => 44.9559,
        "Ti" => 47.867,
        "V" => 50.9415,
        "Cr" => 51.9961,
        "Mn" => 54.938,
        "Fe" => 55.845,
        "Co" => 58.9332,
        "Ni" => 58.6934,
        "Cu" => 63.546,
        "Zn" => 65.39,
        "Ga" => 69.723,
        "Ge" => 72.64,
        "As" => 74.9216,
        "Se" => 78.96,
        "Br" => 79.904,
        "Kr" => 83.8,
        "Rb" => 85.4678,
        "Sr" => 87.62,
        "Y" => 88.9059,
        "Zr" => 91.224,
        "Nb" => 92.9064,
        "Mo" => 95.94,
        "Tc" => 98,
        "Ru" => 101.07,
        "Rh" => 102.9055,
        "Pd" => 106.42,
        "Ag" => 107.8682,
        "Cd" => 112.411,
        "In" => 114.818,
        "Sn" => 118.71,
        "Sb" => 121.76,
        "Te" => 127.6,
        "I" => 126.9045,
        "Xe" => 131.293,
        "Cs" => 132.9055,
        "Ba" => 137.327,
        "La" => 138.9055,
        "Ce" => 140.116,
        "Pr" => 140.9077,
        "Nd" => 144.24,
        "Pm" => 145,
        "Sm" => 150.36,
        "Eu" => 151.964,
        "Gd" => 157.25,
        "Tb" => 158.9253,
        "Dy" => 162.5,
        "Ho" => 164.9303,
        "Er" => 167.259,
        "Tm" => 168.9342,
        "Yb" => 173.04,
        "Lu" => 174.967,
        "Hf" => 178.49,
        "Ta" => 180.9479,
        "W" => 183.84,
        "Re" => 186.207,
        "Os" => 190.23,
        "Ir" => 192.217,
        "Pt" => 195.078,
        "Au" => 196.9665,
        "Hg" => 200.59,
        "Tl" => 204.3833,
        "Pb" => 207.2,
        "Bi" => 208.9804,
        "Po" => 209,
        "At" => 210,
        "Rn" => 222,
        "Fr" => 223,
        "Ra" => 226,
        "Ac" => 227,
        "Th" => 232.0381,
        "Pa" => 231.0359,
        "U" => 238.0289,
        "Np" => 237,
        "Pu" => 244,
        "Am" => 243,
        "Cm" => 247,
        "Bk" => 247,
        "Cf" => 251,
        "Es" => 252,
        "Fm" => 257,
        "Md" => 258,
        "No" => 259,
        "Lr" => 262,
        "Rf" => 261,
        "Db" => 262,
        "Sg" => 266,
        "Bh" => 264,
        "Hs" => 277,
        "Mt" => 268,
    ];
    return $atomicWeights;
}
function oxidation_number()
{
    $oxidationNumber = [
        "H" => +1,
        "He" => 0,
        "Li" => +1,
        "Be" => +2,
        "B" => +3,
        "C" => +4,
        "N" => -5,
        "O" => -2,
        "F" => -1,
        "Ne" => 0,
        "Na" => +1,
        "Mg" => +2,
        "Al" => +3,
        "Si" => +2,
        "P" => +3,
        "S" => +6,
        "Cl" => -1,
        "Ar" => 0,
        "K" => +1,
        "Ca" => +2,
        "Sc" => +3,
        "Ti" => +4,
        "V" => +5,
        "Cr" => +2,
        "Mn" => +2,
        "Fe" => +3,
        "Co" => +5,
        "Ni" => +2,
        "Cu" => +1,
        "Zn" => +2,
        "Ga" => +3,
        "Ge" => +4,
        "As" => +3,
        "Se" => +6,
        "Br" => +7,
        "Kr" => +2,
        "Rb" => +1,
        "Sr" => +2,
        "Y" => +3,
        "Zr" => +4,
        "Nb" => +5,
        "Mo" => +6,
        "Tc" => +7,
        "Ru" => +2,
        "Rh" => +3,
        "Pd" => +3,
        "Ag" => +1,
        "Cd" => +2,
        "In" => +3,
        "Sn" => +2,
        "Sb" => +3,
        "Te" => -2,
        "I" => -1,
        "Xe" => 0,
        "Cs" => +1,
        "Ba" => +2,
        "La" => +3,
        "Ce" => +4,
        "Pr" => +4,
        "Nd" => +4,
        "Pm" => +3,
        "Sm" => +3,
        "Eu" => +3,
        "Gd" => +3,
        "Tb" => +3,
        "Dy" => +4,
        "Ho" => +3,
        "Er" => +3,
        "Tm" => +3,
        "Yb" => +3,
        "Lu" => +3,
        "Hf" => +4,
        "Ta" => +5,
        "W" => +6,
        "Re" => +7,
        "Os" => +4,
        "Ir" => +4,
        "Pt" => +4,
        "Au" => +3,
        "Hg" => +2,
        "Tl" => +1,
        "Pb" => +2,
        "Bi" => +3,
        "Po" => +6,
        "At" => +1,
        "Rn" => +2,
        "Fr" => +1,
        "Ra" => +2,
        "Ac" => +3,
        "Th" => +4,
        "Pa" => +5,
        "U" => +6,
        "Np" => +5,
        "Pu" => +4,
        "Am" => +3,
        "Cm" => +3,
        "Bk" => +3,
        "Cf" => +3,
        "Es" => +3,
        "Fm" => +3,
        "Md" => +3,
        "No" => +2,
        "Lr" => +3,
        "Rf" => +4,
        "Db" => +5,
        "Sg" => +6,
        "Bh" => +7,
        "Hs" => +8,
        "Mt" => +9,
    ];
    return $oxidationNumber;
}


function calculate_levels($value){
    return [
        'Sedentary lifestyle'               => round($value * 1.2),
        'Light exercise'                    => round($value * 1.375),
        'Moderate exercise'                 => round($value * 1.55),
        'Hard exercise'                     => round($value * 1.725),
        'Physical Job or hard exercise'     => round($value * 1.9),
        'Professional Job or hard exercise' => round($value * 2.1),
        'Professional Athlete'              => round($value * 2.4)
    ];
}

function calculate_goals($value){
    return [
        'Weight Loss'         => $value,
        'Mid weight Loss'     => ($value - 250),
        'Extreme Weight Loss' => ($value - 500),
        'Weight Gain'         => $value,
        'Mid weight Gain'     => ($value + 250),
        'Extreme Weight Gain' => ($value + 500)
    ];

}

function calculate_calories($value){
    return [
        'one_day'    => round($value),
        'seven_day'  => round($value * 7),
        'one_month'  => round($value * 30),
    ];
}

