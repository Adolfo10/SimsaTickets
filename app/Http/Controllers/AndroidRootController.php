<?php

namespace App\Http\Controllers;

use App\Modelos\Problema;
use Illuminate\Http\Request;

class AndroidRootController extends Controller
{
    function mostrarHistorial(){
        $datos=[];
        $datos['problemas']=Problema::whereHas('persona')
            ->with('persona')
            ->whereHas('equipotrabajo')
            ->with('equipotrabajo')
            ->whereHas('tipo_problema')
            ->with('tipo_problema')
            ->whereHas('tecnico')
            ->with('tecnico')
            ->get();
        return($datos);
    }
}
