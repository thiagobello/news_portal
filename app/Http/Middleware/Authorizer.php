<?php

namespace news_portal\Http\Middleware;

use Closure;

class Authorizer
{

    public function handle($request, Closure $next)
    {
        if (!$request->is('login') && \Auth::guest()) {
            return  redirect('/login');
        }
        return $next($request);
    }
}
