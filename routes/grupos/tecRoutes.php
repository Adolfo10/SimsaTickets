<?php

//USUARIO TECNICO ----------------------------------------------------------------------------

#Inicio
Route::get('/tec', 'TecController@ViewHome');

#Administrar problemas
Route::get('/tec_admin', 'TecController@View_admin');

//Ver datos
Route::get('/tec_datos','TecController@View_datos');

// --- Acciones --------------------------------------------------

#Cambiar status de problema
Route::post('/tec_estatus', 'TecController@Estatus');

// <-- Ver PDF --> //
Route::get('/tec_seguimiento','TecController@pdf');
Route::get('/pdfdownload','TecController@pdfdownload');

//Editar datos
Route::get('/tec_editar', 'TecController@ViewTecEditar');
Route::post('/tec_actualizar','TecController@actualizar');