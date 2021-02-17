<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        //check if admin is logged in if logged in then redirect admin to dashboard
        if($guard = 'admin' && Auth::guard($guard)->check())
        {
            return redirect()->route('admin.dashboard');
        }

        //check if student is logged in if logged in then redirect to student dashboard
        if($guard = 'student' && Auth::guard($guard)->check() )
        {
            return redirect()->route('student.dashboard');
        }
//        return $next($request);
    }
}
