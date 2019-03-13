<?php

/*
|--------------------------------------------------------------------------
| Por cada línea en dónde se utiliza el metodo "include"
| se incluye el código de archivos php externos, esto
| para una mejor organización de las rutas del proyecto.
|   ***Atte: Equipo Magenta.
| Intent li = new Intent(MainActivity.this,Main2Activity.class);
|           startActivity(li);
|--------------------------------------------------------------------------
*/

//INICIO
include 'grupos/homeRoutes.php';

//EMPLEADO
include 'grupos/empRoutes.php';

//ROOT/ADMINISTRADOR
include 'grupos/rootRoutes.php';

//TECNICO
include 'grupos/tecRoutes.php';
