<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    // public function handle(Request $request, Closure $next, ...$guards)
    // {
    //     $guards = empty($guards) ? [null] : $guards;

    //     foreach ($guards as $guard) {
    //         if (Auth::guard($guard)->check()) {
    //             return redirect(RouteServiceProvider::HOME);
    //         }
    //     }

    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next, $guard=null)
    {
        if (Auth::guard($guard)->check()) {
            switch ($guard) {  
                case 'admin':
                    return redirect()->route('admin.deshboard');
                    break;

                default:
                    return redirect()->route('user.deshboard');
                    break;
            }
        }

        return $next($request);
    }
}
