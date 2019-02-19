<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        // if logged-in user is super-admin, then allow for everything
        if (Auth::user()->email == env('SUPER_ADMIN_EMAIL'))
            return $next($request);

        // check if the user has admin role
        if (!Auth::user()->hasRole('admin'))
            abort('401', "Unauthorised");

        return $next($request);
    }
}
