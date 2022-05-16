<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Paren
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role_id==7)
        {
            return $next($request);
        }
        else
        {
            return redirect('/login');
        }
    }
}
