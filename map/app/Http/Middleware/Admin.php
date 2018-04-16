<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard()->guest()) {
            return redirect()->guest(route('social.login'));
        }
        if (Gate::denies('admin')){
            return abort('404');
        }

        return $next($request);
    }
}
