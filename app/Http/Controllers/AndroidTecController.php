<?php

namespace App\Http\Controllers;

use App\Modelos\Persona;
use Illuminate\Http\Request;

class AndroidTecController extends Controller
{
    function datosTec(){



         $per = Persona::find(2);



        return $per;
    }
}
