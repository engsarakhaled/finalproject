<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CheckActive {


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle (Request $request, Closure $next):
    Response
    {
      //  $user = $request->user(); // Retrieve the authenticated user

       // if (!$user->active==1) {
       //     return redirect()->back()->with('error', 'You must be active to access this page.');
       // }

      //  return $next($request);
    }
}