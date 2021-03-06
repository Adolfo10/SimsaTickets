<?php

namespace App\Http\Controllers;

use App\Modelos\EquipoTrabajo;
use App\Modelos\Persona;
use App\Modelos\Problema;
use App\Modelos\TipoProblema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;

class AndroidEmpController extends Controller
{
    public $id;

    // Fecha, Tipo de problema, status, no. de problema

    function MostrarDatos(Request $r)
    {
        $datosPer= Persona::find($r->input("id"));
        return ($datosPer);
    }

    function ActualizarDatos(Request $request)
    {
        $data = [];
        $emp = Persona::find($request->input('id'));
        $emp->NomEmp = $request->input('NomEmp');
        $emp->ApPat = $request->input('ApPat');
        $emp->ApMat = $request->input('ApMat');
        $emp->TelRed = $request->input('TelRed');
        $emp->CelEmp = $request->input('CelEmp');
        $emp->EmailEmp = $request->input('EmailEmp');
        $emp->save();
        $data["Persona"] = $emp;
        return $data;
    }

    function history(Request $r)
    {
        $colleccion=Collection::make($r);
//        return $this->history($r);
        $datos= DB::table('personas')
            ->join('tipopersona', 'personas.CodTipoPersona', '=', 'tipopersona.id')
            ->join('equipotrabajo', 'personas.id', '=', 'equipotrabajo.CodEmp')
            ->join('problema', 'equipotrabajo.id', '=', 'problema.CodEqTrab')
            ->join('tipoproblema', 'problema.CodTipoProblema', '=', 'tipoproblema.id')
            ->select('problema.id', 'equipotrabajo.Descripcion', 'tipoproblema.NombreProblema',
                'problema.prioridad', 'problema.estatus')
            ->where('personas.id', '=',$colleccion->first() )->get();
        return $datos;
    }





     function EquiposEmpleado(Request $r)
     {
         $Equipos = EquipoTrabajo::whereHas('persona')->with('persona')
             ->where('CodEmp', '=', $r->input("id"))->get();
         return  $Equipos;
     }
     function RegistrarProblema(Request $r) {

         $Prob = new Problema;
         $Prob->CodEqTrab  = $r->input("CodEqTrab");
         $Prob->CodTipoProblema = $r->input("CodTipoProblema");
         $Prob->NotaProblema = $r->input("NotaProblema");
         $Prob->prioridad = $r->input("prioridad");
         $Prob->save();
         return ["Mensaje"=>"Registro exitoso"];
     }

    function regProblema(Request $r)
    {
        $problem = [];
        $Prob = new Problema;
        $Prob->CodEqTrab = $r->input('equipo');
        $Prob->CodTipoProblema = $r->input('tipoprob');
        $Prob->NotaProblema = $r->input('descripcion');
        $Prob->prioridad = $r->input('prioridad');
        $Prob->save();
        $problem["problem"] = $Prob;
        return $problem;
    }

}
