<?php

namespace App\Http\Middleware\Acceso;

use Closure;
use Illuminate\Support\Facades\Session;

class EmpMiddleware
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
        if(Session::get('persona')->CodTipoPersona <> 3)
            abort(404);

        return $next($request);
    }
}
