<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class mix
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->check() || auth()->user()->usertype !== 'SuperAdmin' && auth()->user()->usertype !== 'Admin'){
            abort(403);
        }
        return $next($request);
    }
}
