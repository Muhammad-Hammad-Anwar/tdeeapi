<?php

namespace App\Http\Middleware;

use Closure;

class SecurityHeadersMiddleware
{
    public function handle($request, Closure $next)
    {
        $apiToken = $request->header('auth-pass');
        if ($apiToken != 'Password123') {
            return response()->json(['error' => 'API token is invalid'], 401);
        }

        return $next($request);
    }
}
