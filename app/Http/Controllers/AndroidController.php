<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Modelos\Persona;
use App\Modelos\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AndroidController extends Controller
{
    use AuthenticatesUsers;
    /*public function __construct()
    {
        $this->middleware('auth')->except($this->IniciarSesion());
    }*/

    function IniciarSesion(Request $request){
        $GetUs  = $request->input("NomUsuario");
        $GetPas = $request->input("PassUsuario");
        $datos=[];

        $usuario = Usuario::where('NomUsuario', '=', $GetUs)->get()->first();

        if($usuario != null){
            $pass=$usuario->PassUsuario;
            if (Hash::check($GetPas,$pass)) {
                $persona = Persona::find($usuario->CodEmp);
//                Session::put('persona', $persona);
                $datos['user']=$usuario;
                $datos['persona']=$persona;

                switch ($persona->CodTipoPersona){
                    case 1:
                       // Session::put('img', 'root'); kiko
                       // Session::put('tipoPer', 'Administrador');
//                        return redirect('/root');
                    return $datos;
                        break;
                    case 2:
                        Session::put('img', 'tec');
                        Session::put('tipoPer', 'Técnico');
                        return redirect('/tec');
                        break;
                    case 3:
                        Session::put('img', 'emp');
                        Session::put('tipoPer', 'Empleado');
                        return redirect('/emp');
                        break;
                }
            }
        }

        return redirect('/')->with("Error","Usuario y/o contraseña incorrectos");
    }

    public function loginapi($request){
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {

            return  ["user"=>Auth::user()];
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return ["mensaje"=>"incorrecto"];
    }
}
