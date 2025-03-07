<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $allowedEmails  = 'bilal@gmail.com';

        if ($request->user()->email !== $allowedEmails) {
            abort(403, 'jab ye tera page hai nhi hai tu phire idher kaya kar  rhe hai ');
        }

        return $next($request);
    }
}
