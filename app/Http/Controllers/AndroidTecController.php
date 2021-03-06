<?php

namespace App\Http\Controllers;

use App\Modelos\Persona;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Collection;

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

        $coleccion = Collection::make($request);

        $persona = DB::table('personas')
                ->join('tecnico_problema','tecnico_problema.CodEmp','=','personas.id')
                ->join('problema','problema.id','=','tecnico_problema.CodProblema')
                ->join('equipotrabajo','equipotrabajo.id','=','problema.CodEqTrab')
                ->join('tipoproblema','tipoproblema.id','=','problema.CodTipoProblema')
                ->join('personas as p','p.id','=','equipotrabajo.CodEmp')
                ->where('problema.estatus','PENDIENTE')
                ->where('personas.id',$coleccion->first())
                ->select('problema.id','personas.NomEmp','tipoproblema.NombreProblema','p.NomEmp','problema.estatus')
                ->get();
        
        return $persona;
    }
}
