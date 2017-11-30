<?php

namespace Irisit\AuthzLdap\Http\Middleware;

use Closure;

class RedirectIfNotRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {

        foreach ($roles as $role) {
            if ($request->user()->hasRole($role)) {
                return $next($request);
            }
        }

        return redirect(route(config('irisit_authz.redirect_path')));
    }
}
