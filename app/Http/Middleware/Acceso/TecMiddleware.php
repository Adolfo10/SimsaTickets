<?php

namespace App\Http\Middleware\Acceso;

use Closure;
use Illuminate\Support\Facades\Session;

class TecMiddleware
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
        if(Session::get('persona')->CodTipoPersona <> 2)
        {
            abort(404);
        }
        else
        {
            return $next($request);
        }
        
    }
}
