<?php

namespace App\Http\Controllers;

use App\Modelos\Persona;
use Illuminate\Http\Request;

class AndroidTecController extends Controller
{
    function datosTec(Request $request){

         $per = Persona::find($request->input("idTec"));
        return $per;
    }

    function editTec(Request $request)
    {

        $dato=[];
        $tecnico=Persona::find($request->input("idTec"));
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
}
