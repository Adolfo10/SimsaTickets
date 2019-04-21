<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Respuesta;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AndroidController;
use App\Http\Controllers\AndroidEmpController;
use App\Http\Controllers\AndroidRootController;
use App\Modelos\Usuario;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*Route::post('/login',function (Request $request){
    $lg=new LoginController();
//    $res=new

});*/
Route::post('/loginAnd', function (Request $r){


    $lg=new AndroidController();

    return ["datos"=>$lg->IniciarSesion($r)];
});




Route::get('/comparacion',function (){
    $datos=[];
    $datos["passwordBD"]=Usuario::find(1003)->PassUsuario;
    $datos["micontra"]=Hash::make("123");
    dd(Hash::check("123",Usuario::find(1003)->PassUsuario));
    return $datos;
});






Route::get('/mostrar',function (){
    $mt = new AndroidEmpController();
    return ["info"=>$mt->MostrarDatos()];

});

Route::post('/actualizar', function (Request $r){
    $ac = new AndroidEmpController();
    return ["Act"=>$ac->ActualizarDatos($r)];

});

// Rutas del empleado

Route::post('/history',function (Request $r){
    $his = new AndroidEmpController();

    return $his->history($r->all("id"));
//    return $r->all();
});



// Rutas del Tecnic

Route::post('/datostec',function (Request $r){
    $tec = new \App\Http\Controllers\AndroidTecController();
    return ["tec"=>$tec->datosTec($r)];
});

Route::post('/editTec',function()
{
    $tecnico=new AndroidTecController();
    return $tecnico;
});



// Rutas del Root
Route::post('/insper', function (Request $r)
{
    $ins = new AndroidRootController();
    return ["InsPer"=>$ins->InsertarPersona($r)];

});

Route::post('/mostrarHist',function (){
    $his=new AndroidRootController();
    return ["info"=>$his->mostrarHistorial()];
});

Route::post('/mostrarEmp',function (){
    $empleados=new AndroidRootController();
    return ["empleados"=>$empleados->recuperarEmpleados()];
});