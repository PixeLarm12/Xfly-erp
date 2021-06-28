<?php

namespace App\Http\Middleware;

use Closure;

class FinancialAdmMiddleware
{
    public function handle($request, Closure $next)
    {
        if (! auth()->user()) {
            return redirect('/login/page');
        }
        if (auth()->user()->financial == 0) {
            return redirect('/');
        }

        return $next($request);
    }
}
