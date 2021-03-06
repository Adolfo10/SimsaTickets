<?php

namespace App\Http\Controllers;

use App\Http\Respuesta;
use App\Modelos\EquipoTrabajo;
use App\Modelos\Persona;
use App\Modelos\Problema;
use App\Modelos\TipoProblema;
use App\Modelos\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AndroidRootController extends Controller
{
    function mostrarHistorial(){
//        $datos=[];

        $datos=DB::table('personas AS emp')
            ->join('equipotrabajo','emp.id','=','equipotrabajo.CodEmp')
            ->join('problema','equipotrabajo.id','=','problema.CodEqTrab')
            ->join('tecnico_problema','problema.id','=','tecnico_problema.CodProblema')
            ->join('personas AS tec','tecnico_problema.CodEmp','=','tec.id')
            ->join('tipoproblema','problema.CodTipoProblema','=','tipoproblema.id')
            ->select('problema.id AS id','emp.NomEmp AS empleado','tipoproblema.NombreProblema AS tp',
                'tec.NomEmp AS tecnico','problema.estatus')->orderBy('problema.id')->get();
        /*$datos['problemas']=Problema::whereHas('persona')
            ->whereHas('equipotrabajo')
            ->whereHas('tipo_problema')
            ->whereHas('tecnico')
            ->get();

        $datos['tipo']=TipoProblema::all();
        $datos['empleado']=Persona::whereHas('equipotrabajo')
            ->with('equipotrabajo')
            ->get();

        $datos['tec']=Persona::whereHas('problematec')
            ->with('problematec')
            ->get();*/


        return($datos);
    }


    function InsertarPersona(Request $person)
    {
        $datos = [];


        $datos ['InsPer']=Persona::create([
        'NomEmp' => $person->get('NomEmp'),
        'ApPat' => $person->get('ApPat'),
        'ApMat' => $person->get('ApMat'),
        'TelRed' => $person->get('TelRed'),
        'CelEmp' => $person->get('CelEmp'),
        'EmailEmp' => $person->get('EmailEmp'),
        'CodTipoPersona' => $person->get('CodTipoPersona'),
        'CodDepa' => $person->get('CodDepa')
        ]);
        return "Se registro";


    }

    public function recuperarEmpleados()
    {

        $datos=Persona::all();
        return($datos);
    }

    public function InsertarUsuario(Request $request)
    {
        $datos = [];
        //$user_nom = ucwords($request->get('NomUsuario'));;
        $datos ['InsUss']=Usuario::create
        ([
            'NomUsuario' => $request->get('NomUsuario'),
            'PassUsuario' => Hash::make($request->get('PassUsuario')),
            //'PassUsuario' => $request->get('PassUsuario'),
            'CodEmp' => $request->get('CodEmp'),
            'api_token' => Str::random(60)
        ]);

        return "Se registro";
    }

    public function allPers()
    {
     /* $datosPer = [];
        $datosPer["Persona"] = Persona::all();
        $datosPer["IDE"] = Persona::all('id');
        return ($datosPer);*/
        $datosPer = [];
        $datosPer["Persona"] = Persona::all();
        return ($datosPer);

    }

    public function InsertarEquipo(Request $request)
    {
        $datos = [];

        $datos ['InsEq']=EquipoTrabajo::create([
            'Descripcion' => $request->get('Descripcion'),
            'NoSerie' => $request->get('NoSerie'),
            'TipoEquipo' => $request->get('TipoEquipo'),
            'CodEmp' => $request->get('CodEmp'),
        ]);
        return "Se registro";
    }
}
