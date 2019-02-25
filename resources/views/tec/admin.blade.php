@extends('tec.home')
@yield('cssfondo')
@section('cssextra')
@endsection

@section('contenido')

    <table class="table table-light">
        <thead class="thead">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Equipo</th>
            <th scope="col">Falla</th>
            <th scope="col">Tipo de problema</th>
            <th scope="col">estatus</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($tecnicos->problematec as $tec)
        <tr>
            <th scope="row">{{$tec->id}}</th>
            <td>{{$tec->persona[0]->NomEmp}}</td>
            <td>{{$tec->CodEqTrab}}</td>
            <td>{{$tec->NotaProblema}}</td>
            <td>{{$tec->tipo_problema->NombreProblema}}</td>
            <form action="/tec_estatus" method="post">
                {{csrf_field()}}
                <input type="hidden" name="idt" value="{{$tecnicos->id}}">
                <input type="hidden" name="p" value="{{$tec->id}}">
                <td>
                    <select name="est" class="custom-select">
                        <option value="{{$tec->estatus}}" selected>{{$tec->estatus}}</option>
                        <option value="ATENDIDO">Atendido</option>
                        <option  value="PENDIENTE">Pendiente</option>
                    </select>
                </td>
                <td><button type="submit" class="btn btn-warning">Actualizar</button></td>
            </form>
        </tr>
        @endforeach

        </tbody>
    </table>
@endsection

@section('javascript')
    @endsection