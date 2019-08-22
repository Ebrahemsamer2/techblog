<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class Verified
{

    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            if(Auth::user()->email_verified_at !== null) {
                return $next($request);
            }
        }
        return redirect('/');
    }
}
