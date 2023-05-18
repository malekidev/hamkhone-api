<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()->CheckProfileComplete()){
            abort(403,'برای دسترسی به این قسمت باید پروفایل خود را تکمیل کنید');
        }
        return $next($request);
    }
}
