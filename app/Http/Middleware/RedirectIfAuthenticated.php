<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            // if (Auth::guard($guard)->check() && $guard == 'doctor') {
            //     return redirect()->route('doctor.dashboard');
            // }
            // if (Auth::guard($guard)->check() && $guard == 'patient') {

            //     return redirect()->route('patient.dashboard');
            // }
            // if (Auth::guard($guard)->check()) {
            //     return redirect(RouteServiceProvider::HOME);
            // }
            if (Auth::guard($guard)->check()) {
                // Redirect authenticated users based on the guard
                if ($guard === 'doctor') {
                    return redirect('/doctor/dashboard');
                } else if ($guard === 'patient') {
                    return redirect('/patient/dashboard');
                } else {
                    return redirect(RouteServiceProvider::HOME);
                }
            }
        }

        return $next($request);
    }
}
