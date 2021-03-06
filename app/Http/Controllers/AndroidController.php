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

    /*public function __construct()
    {
        $this->middleware('auth')->except($this->IniciarSesion());
    }*/

    function IniciarSesion(Request $request)
    {
        $GetUs = $request->input("NomUsuario");
        $GetPas = $request->input("PassUsuario");
        $datos = [];

        $usuario = Usuario::where('NomUsuario', '=', $GetUs)->get()->first();

        if ($usuario != null) {
            if (Hash::check($GetPas, $usuario->PassUsuario)) {
                $persona = Persona::find($usuario->CodEmp);
                $datos["user"] = $usuario;
                $datos["persona"] = $persona;
            }
        }

        return ($datos);
    }

}
