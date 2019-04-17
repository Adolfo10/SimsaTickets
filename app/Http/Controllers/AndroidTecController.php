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
}
