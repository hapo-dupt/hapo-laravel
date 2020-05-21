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
            if ($user->role == (new Member())->role_admin) {
                return $next($request);
            } else {
                if ($user->role === (new Member())->role_member) {
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
