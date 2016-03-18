<?php
/**
 * User: sasik
 * Date: 3/18/16
 * Time: 9:06 AM
 */

namespace App\Http\Middleware;


use App\Models\ParentModel;

class ParentMiddleware
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

        $user = $user = auth()->user();
        /**
         * @var $parent ParentModel
         */
        $parent = $user->parent;

        return  $parent ? $next($request) : response('Unauthorized.', 401);
    }

}