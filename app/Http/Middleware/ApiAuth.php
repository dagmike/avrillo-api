<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the token from the request
        $token = $request->bearerToken();

        if (!$token || $token != env('API_TOKEN')) {
            abort(401, 'Unauthorized');
        } 
    
        return $next($request);
    }
}
