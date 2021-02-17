<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        if (Auth::guard('admin')->check()) {
            $admin = auth('admin')->user();

            if (!($admin->verified)) {
                return redirect()->route('admin.verification.failed');
            }
            if (!($admin->status)) {
                return redirect()->route('admin.account.disabled');
            }

            return $next($request);
        } else {
            return redirect()->route('admin.login');
        }
    }
}
