<?php

namespace MaxBoom\Dashboard\Http\Middleware;

use Closure;
use MaxBoom\Dashboard\Models\UserRole2User;
use MaxBoom\Dashboard\Models\UserRole;
use MaxBoom\Dashboard\Models\AreaActon;
use Route;

class AreaAccess
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
        if (!$request->user()) {
            return redirect('/home');
        }

        $action = AreaActon::whereAction(
            Route::getCurrentRoute()->getUri()
        )->orWhere(
            'name',
            Route::currentRouteName()
        )->first();

        $access = $request->user()->can($action, $action);

        if (!$access) {
            return abort(404);
        }

        return $next($request);
    }
}
