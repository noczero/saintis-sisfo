<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
    

        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.dashboard');
                }
                break;
            case 'guru':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('guru.dashboard');
                }
                break;
            case 'siswa':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('siswa.dashboard');
                }
                break;
            case 'manager':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('manager.dashboard');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/home');
                }
                break;
        }
        
        return $next($request);
    }
}
