<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class user
{
    use Notifiable;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->check() || auth()->user()->usertype !== 'User'){
            abort(403);
        }
        return $next($request);
    }
}
