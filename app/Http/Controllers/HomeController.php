<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Persona;
use App\Modelos\TipoPersona;
use App\Modelos\Usuario;
use Session;

class HomeController extends Controller
{
    function __construct()
    {
        $this->middleware('login', ['except' => ['CerrarSesion']]);
    }
    
    //----- INICIO DE SESION -------------------------
    function IniciarSesion(Request $request){
      session_start();
      $GetUs  = $request->input("NomUsuario");
      $GetPas = $request->input("PassUsuario");
      
      $usuario = Usuario::where('NomUsuario', '=', $GetUs)->where('PassUsuario', '=', $GetPas)->get()->first();
      
      if($usuario != null){
        $persona = Persona::find($usuario->CodEmp);
        
        Session::put('persona', $persona);
        if($persona->CodTipoPersona == 1) 
            {             
                Session::put('img', 'root');
                Session::put('tipoPer','Administrador'); 
                return redirect('/root');
            }
        else if($persona->CodTipoPersona == 2)
            {                
                Session::put('img', 'tec');
                Session::put('tipoPer','Técnico'); 
                return redirect('/tec');
            }
        else if($persona->CodTipoPersona == 3)
            {            
                Session::put('img', 'emp');
                Session::put('tipoPer','Empleado'); 
              return redirect('/emp');
            }
      }
      
        return redirect('/')->with("Error","Usuario y/o contraseña incorrectos");
    }

    function CerrarSesion(){
        Session::flush();
        return redirect('/');
    }

    function ViewLogin(){
        return view('login');
    }
}
