<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthControlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()){
            return redirect(route('signInIndex'));
        }
            if (Auth::user()->role == 'admin' ){
            return redirect(route('adminIndex'));
        }
        if (Auth::user()->role == 'student' ){
            return redirect(route('studentIndex'));
        }
        return redirect('/');
    }
}
