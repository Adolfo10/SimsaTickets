@extends('emp.home')
@yield('cssfondo')

@section('cssextra')
    <style>
        h1{ color: #e9ff38; }
        td{
            font-size: 14px;
        }
    </style>
@endsection
@section('contenido')

    <div class="text-center">
        <h1>Historial de problemas</h1>
        <br>
    </div>

    <table class="table table-striped table-dark table-responsive-lg">
        <thead>
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">#</th>
            <th scope="col">Equipo</th>
            <th scope="col">Tipo de problema</th>
            <th scope="col">Prioridad</th>
            <th scope="col">Estatus</th>

        </tr>
        </thead>
        <tbody>

        @foreach($historial as $h)
            <tr>
                <td>{{$h->fecha_prob}}</td>
                <td>{{$h->hora_prob}}</td>
                <td>{{$h->id}}</td>
                <td>{{$h->Descripcion}}</td>
                <td>{{$h->NombreProblema}}</td>
                <td>{{$h->prioridad}}</td>
                <td>{{$h->estatus}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection





