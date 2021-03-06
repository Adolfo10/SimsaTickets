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




// Rutas del empleado

Route::post('/mostrar',function (Request $r){
    $mt = new AndroidEmpController();
    return ["info"=>$mt->MostrarDatos($r)];

});

Route::post('/actualizar', function (Request $r){
    $ac = new AndroidEmpController();
    return ["Act"=>$ac->ActualizarDatos($r)];

});

Route::post('/history',function (Request $r){
    $id = new AndroidEmpController();

    return $id->history($r);
});



Route::post('/EquipoEmp', function (Request $r){
    $eque = new AndroidEmpController();
    return ["Equip"=>$eque->EquiposEmpleado($r)];
//    return $r->input("id");
});

Route::post('/regprob', function (Request $request){
    $eque = new AndroidEmpController();
    return ["prob"=>$eque->RegistrarProblema($request)];
});



// Rutas del Tecnico

Route::post('/datostec',function (Request $r){
    $tec = new \App\Http\Controllers\AndroidTecController();
    return ["tec"=>$tec->datosTec($r)];
});

Route::post('/edittec',function(Request $r)
{
    $tecnico= new \App\Http\Controllers\AndroidTecController();
    return ["edittec"=>$tecnico->edittec($r)];
});

Route::post('/histec',function(Request $r)
{
    $his= new \App\Http\Controllers\AndroidTecController();
    return $his->histec($r);
});



// Rutas del Root
Route::post('/insper', function (Request $r)
{
    $ins = new AndroidRootController();
    return ["InsPer"=>$ins->InsertarPersona($r)];

});

Route::post('/mostrarHist',function (){
    $his=new AndroidRootController();
    return $his->mostrarHistorial();
});

Route::post('/mostrarEmp',function (){
    $empleados=new AndroidRootController();
    return ["empleados"=>$empleados->recuperarEmpleados()];
});

Route::post('/insuss', function (Request $r)
{
    $ins = new AndroidRootController();
    return ["InsUss"=>$ins->InsertarUsuario($r)];
});

Route::get('/allper',function ()
{
    $empleados=new AndroidRootController();
    return ["info"=>$empleados->allPers()];
});


Route::post('/insequ',function (Request $r)
{
    $empleados=new AndroidRootController();
    return ["info"=>$empleados->InsertarEquipo($r)];
});
