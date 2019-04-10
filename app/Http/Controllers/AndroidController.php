<?php

namespace App\Http\Controllers;

use App\Modelos\Persona;
use App\Modelos\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AndroidController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('api')->except($this->IniciarSesion());
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
}
