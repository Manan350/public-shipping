<?php

namespace App\Http\Middleware;

use Closure;

class checkLoginSession
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
        if(loginController::checkSession())
        {
            return $next($request);
        }
        return  redirect('adminLogin');
    }
}
