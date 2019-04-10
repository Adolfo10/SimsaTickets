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

    function IniciarSesion(Request $request){
        $GetUs  = $request->input("NomUsuario");
        $GetPas = $request->input("PassUsuario");
        $passenc=Hash::make($GetPas);
        $datos=[];

        $usuario = Usuario::where('NomUsuario', '=', $GetUs)->where('PassUsuario','=',$passenc)->get()->first();

        if($usuario != null){
                $persona = Persona::find($usuario->CodEmp);
                $datos['user']=$usuario;
                $datos['persona']=$persona;
        }

        return json_encode($datos);
    }

}
