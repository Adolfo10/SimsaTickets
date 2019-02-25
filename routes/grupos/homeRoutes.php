<?php
Route::get('/', 'HomeController@ViewLogin');
Route::post('/login', 'HomeController@IniciarSesion');

Route::get('/cerrarSesion', 'HomeController@CerrarSesion');