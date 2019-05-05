<?php

namespace App\Http\Middleware\Acceso;

use Closure;
use Illuminate\Support\Facades\Session;

class RootMiddleware
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
        if(Session::get('persona') == null)
        {
            return redirect('/');
        }
        return $next($request);
    }
}
