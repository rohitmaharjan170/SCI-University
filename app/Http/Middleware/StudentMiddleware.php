<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::guard('student')->check()) {
            if (Auth::guard('student')->user()->verified)
                return $next($request);
            return redirect()->route('verify.email');
        } else {
            return redirect()->route('school.login');
        }
    }
}
