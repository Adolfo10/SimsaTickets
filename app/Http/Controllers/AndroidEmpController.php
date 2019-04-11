<?php

namespace App\Http\Controllers;

use App\Modelos\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AndroidEmpController extends Controller
{

    // Fecha, Tipo de problema, status, no. de problema

     function MostrarDatos(){

//         $id = $request->input("id");
         $datosPer = [];

         $datosPer["person"] =  Persona::find(3);

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

}
