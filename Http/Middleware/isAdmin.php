<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check()) {
            if (Auth::users()->isAdmin == '1') {

                return $next($request);
            } else {

                return redirect('/')->with('message', ' your are only user ok mari jaan ');
            }
        } else {
            return redirect('/login')->with('message', ' Login   first to access this page');
        }
    }
}
