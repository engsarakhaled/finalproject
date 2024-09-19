<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->active === 1) {
            // User is already logged in and active, continue to the next middleware
            return $next($request);
        } else {
          //  auth()->logout();
            return redirect()->back()->withErrors(['error' => 'Your account is not active.']);
                }
    }
}