@extends('plantillas.base')

@yield('cssfondo')
@section('cssextra')
@endsection
@section('botones')
    <li>
        <a href="/root">Inicio</a>
    </li>

    <li>
        <a href="/root_historial" aria-expanded="false" style="font-size: 21px;">Historial/Reasignación</a>
    </li>

    <li>
        <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Agregar</a>
        <ul class="collapse list-unstyled" id="homeSubmenu1">
            <li>
                <a href="/root_addEmpleado">Empleado</a>
            </li>
            <li>
                <a href="/root_addEquipo">Equipo de trabajo</a>
            </li>
            <li>
                <a href="/root_regUsuario">Usuario</a>
            </li>
        </ul>
    </li>

    <li>
        <a href="/root_graficos">Gráficos</a>
    </li>
@endsection

@section('contenido')

    <div class="card text-white text-center mx-auto">
        <div class="card-header">BIENVENIDO {{strtoupper(Session::get('persona')->NomEmp)}}</div>
        <div class="card-img text-center">
            <img src="/img/temp/dia.png" alt="buenos_dias">
        </div>
        <div class="card-body text-white">
          <h5 class="card-title"><i>Qué tengas un buen día</i></h5>
          <small class="card-subtitle">...de parte de <i>Grupo Simsa.</i></small>
        </div>
    </div>

@endsection