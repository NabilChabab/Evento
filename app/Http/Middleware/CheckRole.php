<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $role): Response
    {
        $user = $request->user();

    if (Auth::check()) {
        if ($user->roles()->first()->name === $role) {
            return $next($request);
        }
    }

    // Redirect to login with an error message for unauthorized access
    return redirect('/login')->with('error', 'Unauthorized access');
}
}
