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
         $datoshist = [];

         $historial= DB::table('problema')
             ->join('seguimiento', 'problema.id', '=', 'seguimiento.problema')
             ->join('tipoproblema', 'problema.CodTipoProblema', '=', 'tipoproblema.id')
             ->join('equipotrabajo', 'problema.CodEqTrab', '=', 'equipotrabajo.id')
             ->join('personas', 'equipotrabajo.CodEmp', '=', 'personas.id')
             ->join('problema_persona', 'personas.id', '=', 'problema_persona.CodEmp')
             ->where('problema_persona.CodEmp','=', '21')
             ->select('seguimiento.fecha_prob', 'seguimiento.hora_prob', 'problema.id',
                 'equipotrabajo.Descripcion', 'tipoproblema.NombreProblema',
                 'problema.prioridad', 'problema.estatus')
             ->orderBy('seguimiento.fecha_prob', 'desc')
             ->get();

         $datoshist["historial"] = $historial;

         return ($datoshist);
     }
}
