<?php

namespace App\Http\Controllers;

use App\Http\Respuesta;
use App\Modelos\EquipoTrabajo;
use App\Modelos\Persona;
use App\Modelos\Problema;
use App\Modelos\TipoProblema;
use Illuminate\Http\Request;

class AndroidRootController extends Controller
{
    function mostrarHistorial(){
        $datos=[];
        $datos['problemas']=Problema::whereHas('persona')
            ->whereHas('equipotrabajo')
            ->whereHas('tipo_problema')
            ->whereHas('tecnico')
            ->get();

        $datos['tipo']=TipoProblema::all();
        $datos['empleado']=Problema::whereHas('persona')
            ->with('persona')
            ->whereHas('equipotrabajo')
            ->whereHas('tipo_problema')
            ->whereHas('tecnico')
            ->get();;
        return($datos);
    }


    function InsertarPersona(Request $person)
    {
        $datos = [];


        $datos ['InsPer']=Persona::create([
        'NomEmp' => $person->get('nom'),
        'ApPat' => $person->get('apeP'),
        'ApMat' => $person->get('apeM'),
        'TelRed' => $person->get('telR'),
        'CelEmp' => $person->get('telP'),
        'EmailEmp' => $person->get('mail'),
        'CodTipoPersona' => $person->get('tper'),
        'CodDepa' => $person->get('dep')
        ]);
        return "Se registro";


    }
}
