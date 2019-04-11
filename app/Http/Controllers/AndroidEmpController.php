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

         $datosPer["person"] =  Persona::find(1);

         return ($datosPer);
     }
}
