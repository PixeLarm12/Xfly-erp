<?php

namespace App\Http\Middleware;

use Closure;

class IsAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            return redirect('/');
        }

        return $next($request);
    }
}
