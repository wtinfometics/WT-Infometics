<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Reset
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if session exists
        if (!session()->has('reset')) {
            return redirect('/login')->with('error', 'send forget password Request');
        }

        return $next($request);
    }
}
