<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        $user = Auth::guard('admin')->user();
        if (!$user->is_root) // the firt time build || admin@admin.com | 123456789?as
        {
            if (!$user->checkPermission($permission)) {
                $response = ['code' => -1, 'msg' => __('messages.not_permission')];
                return back()->with('result', $response);
            }
        }

        return $next($request);
    }
}
