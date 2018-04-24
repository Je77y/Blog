<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthorAuthenticate
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
        if (Auth::check() && Auth::user()->isAuthor())
        {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->isSuperAdmin())
        {
            return redirect()->route('superadmin');
        }
        elseif (Auth::check() && Auth::user()->isAdmin())
        {
            return redirect()->route('admin');
        }
            
        return redirect()->route('admin.login');
    }
}
