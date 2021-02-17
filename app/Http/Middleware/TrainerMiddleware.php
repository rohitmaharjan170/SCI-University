<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TrainerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('trainer')->check()) {
            if (Auth::guard('trainer')->user()->email_verified)
                return $next($request);
            return redirect()->route('verify.email');
        } else {
            return redirect()->route('school.login');
        }
    }
}
