<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class SuperAdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isSuperAdmin())
        {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->isAdmin())
        {
            return redirect()->route('admin');
        }
        elseif (Auth::check() && Auth::user()->isAuthor())
        {
            return redirect()->route('author');
        }
                  
        return redirect()->route('admin.login');
    }
}
