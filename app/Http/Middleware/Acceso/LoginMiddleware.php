<?php

namespace App\Http\Middleware\Acceso;

use Closure;
use Illuminate\Support\Facades\Session;

class LoginMiddleware
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
        if(Session::has('persona')){
            $tipo_per = Session::get('persona')->CodTipoPersona;
            if($tipo_per == 1)
                return redirect('/root');
            if($tipo_per == 2)
                return redirect('/tec');
            if($tipo_per == 3)
                return redirect('/emp');
        }

        return $next($request);
    }
}
