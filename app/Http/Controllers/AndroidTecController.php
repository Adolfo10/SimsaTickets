<?php

namespace App\Http\Controllers;

use App\Modelos\Persona;
use Illuminate\Http\Request;
use DB;

class AndroidTecController extends Controller
{
    function datosTec(Request $request){

         $per = Persona::find($request->input("idTec"));
        return $per;
    }

    function edittec(Request $request)
    {

        $dato=[];
        $tecnico=Persona::find($request->input("id"));
        $tecnico->NomEmp=$request->input('NomEmp');
        $tecnico->ApPat=$request->input('ApPat');
        $tecnico->ApMat=$request->input('ApMat');
        $tecnico->TelRed=$request->input('TelRed');
        $tecnico->CelEmp=$request->input('CelEmp');
        $tecnico->EmailEmp=$request->input('EmailEmp');
        $tecnico->save();
        $dato["Persona"] = $tecnico;

        return $dato;
    }


    function histec(Request $request)
    {
        $persona = DB::table('personas')
                ->join('tecnico_problema','tecnico_problema.CodEmp','=','personas.id')
                ->join('problema','problema.id','=','tecnico_problema.CodProblema')
                ->join('equipotrabajo','equipotrabajo.id','=','problema.CodEqTrab')
                ->join('tipoproblema','tipoproblema.id','=','problema.CodTipoProblema')
                ->where('problema.estatus','PENDIENTE')
                ->where('personas.id',$request->input('id'))
                ->get();
        
        return $persona;
    }
}
