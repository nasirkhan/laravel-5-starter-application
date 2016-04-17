<?php

namespace App\Http\Middleware;

use Flash;
use Closure;

class PermissionMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (!$request->user()->can($permission)) {
            Flash::error('You do not have access to do that.');
            return redirect('/');
        }

        return $next($request);
    }
}
