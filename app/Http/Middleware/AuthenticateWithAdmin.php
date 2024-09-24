<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateWithAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (Auth::guard($guard)->check())
        {
            return $next($request);
        }
        /*else if(Auth::guard()->check())
        {
            // flush
            return redirect('/admin/logout');
        }*/
        else
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
        }
        return redirect('/admin/login');
    }
}
