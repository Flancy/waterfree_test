<?php

namespace App\Http\Middleware;

use Closure;

class CheckReferral
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( !$request->hasCookie('referral') && $request->query('referral') ) {
            return redirect($request->url())->withCookie(cookie()->forever('referral', $request->query('referral')));
        }

        return $next($request);
    }
}
