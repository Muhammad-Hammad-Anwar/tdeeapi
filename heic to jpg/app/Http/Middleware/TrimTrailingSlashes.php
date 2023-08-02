<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrimTrailingSlashes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {

    //     if (!$request->secure() && env('APP_ENV') !== 'local') {
    //         return redirect()->secure($request->getRequestUri(), 301);
    //     }
    //     return $next($request);
    // }
    // public function handle(Request $request, Closure $next)
    // {
    //     if (preg_match('/.+\/$/', $request->getRequestUri())) {
    //         $url = rtrim($request->getRequestUri(), '/');
            
    //         return redirect($url, 200);
    //     }

    //     return $next($request);
    // }

    public function handle($request, Closure $next)
    {
        $path = $request->getPathInfo();
        $path = rtrim($path, '/');

        if ($request->getMethod() == 'GET' && $path != $request->getPathInfo()) {
            return redirect()->to($path, 301);
        }

        return $next($request);
    }
}
