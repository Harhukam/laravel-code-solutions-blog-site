<?php

namespace App\Http\Middleware;

use Closure;

class IsSeller
{

    public function handle($request, Closure $next)
    {
        if(auth()->user()->isSeller()) {
            return $next($request);
        }
        return redirect('home');

    }


}
