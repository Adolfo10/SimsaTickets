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
        $datos['empleado']=Persona::whereHas('equipotrabajo')
            ->with('equipotrabajo')
            ->get();

        $datos['tec']=Persona::whereHas('problematec')
            ->with('problematec')
            ->get();


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

    public function recuperarEmpleados(){
        $datos=[];
        $datos['empleados']=Persona::all()->where('CodTipoPersona','=',3);
        return($datos);
    }
}
