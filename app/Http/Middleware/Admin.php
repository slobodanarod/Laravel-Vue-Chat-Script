<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::guard("admin")->check() && Auth::guard("admin")->user()->admin === 1) {
            return $next($request);
        }
        return redirect()->route("admin.login");
    }
}
