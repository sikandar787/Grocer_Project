<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */


    public function handle($request, Closure $next, $guard = 'admin')
    {
        //dd(Auth::guard($guard)->check());
        if (!Auth::guard($guard)->check()) {
            return redirect('/');
        }

        return $next($request);
    }
}
