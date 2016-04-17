<?php

namespace App\Http\Middleware;

use Flash;
use Closure;

class RoleMiddleware
{

    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!$request->user()->hasRole($role)) {
            Flash::error('You do not have access to do that.');
            return redirect('/');
        }

        return $next($request);
    }
}
