<?php

namespace App\Http\Controllers;

use App\Modelos\EquipoTrabajo;
use App\Modelos\Persona;
use App\Modelos\Problema;
use App\Modelos\TipoProblema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AndroidEmpController extends Controller
{

    // Fecha, Tipo de problema, status, no. de problema

     function MostrarDatos(){

//         $id = $request->input("id");
         $datosPer = [];

         $datosPer["person"] =  Persona::find(3);
         $datosPer["EquipoTrabajo"] =  EquipoTrabajo::whereHas('persona')->with('persona')
             ->where('CodEmp', '=', '1')->get();

         return ($datosPer);
     }

     function ActualizarDatos(Request $request){
         $data = [];
         $emp= Persona::find(3);
         $emp->NomEmp=$request->input('NomEmp');
         $emp->ApPat=$request->input('ApPat');
         $emp->ApMat=$request->input('ApMat');
         $emp->TelRed=$request->input('TelRed');
         $emp->CelEmp=$request->input('CelEmp');
         $emp->EmailEmp=$request->input('EmailEmp');
         $emp->save();
         $data["Persona"] = $emp;
         return $data;
     }

    function history(){

         $dat = [];
//         $h = [];
//        $Prob = Problema::all();
////        $TipoProb = TipoProblema::all();
//        $Eqt = Persona::whereHas('equipotrabajo')->with('equipotrabajo')->where('id', '=', '1')->get();
//
////
//            EquipoTrabajo::whereHas('persona')->with('persona')
//            ->where('CodEmp', '=', '39')->get();

     $per = Persona::find(1);
        $eqt = EquipoTrabajo::whereHas('persona')->with('persona')
            ->where('CodEmp', '=', $per->id)->get();

//        $historial= DB::table('problema')
//            ->join('seguimiento', 'problema.id', '=', 'seguimiento.problema')
//            ->join('tipoproblema', 'problema.CodTipoProblema', '=', 'tipoproblema.id')
//            ->join('equipotrabajo', 'problema.CodEqTrab', '=', 'equipotrabajo.id')
//            ->join('personas', 'equipotrabajo.CodEmp', '=', 'personas.id')
//            ->where('problema.CodEqTrab','=', $Eqt[0]->CodEmp)
//            ->select('seguimiento.fecha_prob', 'seguimiento.hora_prob', 'problema.id',
//                'equipotrabajo.Descripcion', 'tipoproblema.NombreProblema',
//                'problema.prioridad', 'problema.estatus')
//            ->orderBy('seguimiento.fecha_prob', 'desc')
//            ->get();
//

        $dat["person"]= $per;
        $dat["equip"]= $eqt;


        return $dat["equip"]->id;










    }



    function regProblema(Request $r)
    {
        $problem = [];
        $Prob = new Problema;
        $Prob->CodEqTrab  = $r->input('equipo');
        $Prob->CodTipoProblema = $r->input('tipoprob');
        $Prob->NotaProblema = $r->input('descripcion');
        $Prob->prioridad = $r->input('prioridad');
        $Prob->save();
        $problem["problem"] = $Prob;
        return $problem;
    }

}
