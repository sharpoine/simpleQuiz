<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, $next)
    {
        if (!$request->session()->has('user_type')) {
            return redirect('/login');

        }
        if ($request->session()->get('user_type') != 0) {
            return redirect('/admin/dashboard');
        }

        return $next($request);
    }
}
