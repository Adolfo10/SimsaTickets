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



Route::get('/history',function (){
     $his = new AndroidEmpController();
     return ["his"=>$his->history()];
});


Route::get('/mostrar',function (){
    $mt = new AndroidEmpController();
    return ["info"=>$mt->MostrarDatos()];

});

Route::post('/actualizar', function (Request $r){
    $ac = new AndroidEmpController();
    return ["Act"=>$ac->ActualizarDatos($r)];

});

Route::post('/mostrarHist',function (){
    $his=new AndroidRootController();
    return ["info"=>$his->mostrarHistorial()];
});




// Rutas del Tecnic

Route::get('/datostec',function (){
    $tec = new \App\Http\Controllers\AndroidTecController();
    return ["tec"=>$tec->datosTec()];
});


