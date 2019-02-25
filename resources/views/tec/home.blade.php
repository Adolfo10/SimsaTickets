@extends('plantillas.base')

@yield('cssfondo')
@section('cssextra')
    <style>
        form{
            font-family: Arial;
            font-size: 12pt;
            color:#e9ff38;
        }
    </style>
@endsection
@section('botones')
    <li>
        <a href="/tec">Inicio</a>
    </li>

    <li>
        <a href="/tec_admin" aria-expanded="false" style="font-size: 19px;">Administrar problemas</a>
    </li>

    <li>
        <a href="/root_seguimiento">Ver Seguimiento</a>
    </li>

    <li>
        <a href="/tec_datos">Ver datos</a>
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