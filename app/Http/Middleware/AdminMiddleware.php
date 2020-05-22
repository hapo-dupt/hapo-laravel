<?php

namespace App\Http\Middleware;

use App\Models\Member;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('member')->check()) {
            $user = Auth::guard('member')->user();
            if ($user->role == Member::ROLE_ADMIN) {
                return $next($request);
            } else {
                if ($user->role === Member::ROLE_MEMBER) {
                    return redirect('members');
                } else {
                    return redirect('login');
                }
            }
        } else {
            return redirect('login');
        }
    }
}
