<?php
/**
 * User: sasik
 * Date: 2/22/16
 * Time: 7:50 PM
 */

namespace App\Http\Middleware;



class ApiAuth
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, \Closure $next, $guard = null)
    {
        \Log::debug('Log authorization data', $request->headers->all());
        return \Auth::onceBasic('telephone') ?: $next($request);
    }
}