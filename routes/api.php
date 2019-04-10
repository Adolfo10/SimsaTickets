<?php

use Illuminate\Http\Request;
use App\Http\Respuesta;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AndroidController;

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
    dd($lg->IniciarSesion($r,200));
    $Res=new Respuesta($lg->IniciarSesion($r,200));
    return $Res->enJson();
});

Route::get('/comparacion',function (){
    $datos=[];
    $datos["passwordBD"]=\App\Modelos\Usuario::find(1003)->PassUsuario;
    $datos["micontra"]=\Illuminate\Support\Facades\Hash::make("123");
    return $datos;
});

