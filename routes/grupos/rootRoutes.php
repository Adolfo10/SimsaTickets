<?php

//USUARIO ROOT ----------------------------------------------------------------------------

#Inicio
Route::get('/root', 'RootController@ViewHome');

#Agregar empleado
Route::get('/root_addEmpleado', 'RootController@View_addEmpleado');

#Agregar equipo de trabajo
Route::get('/root_addEquipo', 'RootController@View_addEquipo');

#Agregar usuario
Route::get('/root_regUsuario', 'RootController@View_regUsuario');

#Ver historial
Route::get('/root_historial', 'RootController@View_historial');

#Ver graficos
Route::get('/root_graficos', 'RootController@ViewGraficos');

//------------------------------------------------------------------------------
// -- Acciones ----------------------------------------------------

#Agregar empleado
Route::post('/root_addPersona', 'RootController@addPersona');

#Agregar usuario
Route::post('/root_addUsuario', 'RootController@addUsuario');

#Agregar equipo de trabajo
Route::post('/root_addEquipo', 'RootController@addEquipo');

#Reasignar tecnico
Route::post('/root_asignar1', 'RootController@relTecnico');

#Conseguir datos de grafica
Route::get('/root_graficos_data', 'RootController@GraficosData');