<?php

//USUARIO EMPLEADO ----------------------------------------------------------------------------

#Inicio
Route::get('/emp', 'EmpController@ViewHome');

#Registrar problema
Route::get('/emp_reg', 'EmpController@AgregarProblema');

#Ver datos
Route::get('/emp_datos', 'EmpController@ViewVerDatos');

#Editar datos
Route::get('/emp_editar', 'EmpController@ViewEditDatos');

#Ver historial
Route::get('/emp_historial', 'EmpController@Historial');

#ACCIONES-------------------------------
Route::post('/emp_reg', 'EmpController@RegistrarProblema');

Route::post('/emp_editar', 'EmpController@Actualizar');