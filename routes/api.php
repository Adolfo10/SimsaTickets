<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Respuesta;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AndroidController;
use App\Http\Controllers\AndroidEmpController;

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
    $datos["passwordBD"]=\App\Modelos\Usuario::find(1003)->PassUsuario;
    $datos["micontra"]=\Illuminate\Support\Facades\Hash::make("123");
    dd(\Illuminate\Support\Facades\Hash::check("123",\App\Modelos\Usuario::find(1003)->PassUsuario));
    return $datos;
});



Route::get('/mostrar',function (){
    $mt = new AndroidEmpController();
    return ["info"=>$mt->MostrarDatos()];

});



