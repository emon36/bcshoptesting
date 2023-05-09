<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CartMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       if ($request->hasCookie('__cart'))
       {
           return $next($request);
       }

        $uuid = Str::uuid()->toString();
        $time = time() + 60 * 60 * 24;
        return $next($request)->withCookie(cookie('__cart',$uuid, $time));
    }
}
