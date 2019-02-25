@extends('root.home')
@yield('cssfondo')

@section('cssextra')
    <style>
        form{
            font-family: Arial;
            font-size: 12pt;
        }
        h1{ color: #e9ff38; }
        td{
            font-size: 14px;
        }
        #buscar{
            height: 30px;
            font-size: 16px;
        }
    </style>
@endsection
@section('contenido')

    <div class="text-center">
        <h1>Historial / Reasignación</h1>
        <br>
    </div>

    <!--<div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <input id="buscar" class="form-control" type="text" placeholder="Escribe el nombre a buscar...">
            </div>
            <div class="col-md-4"></div>
        </div>
    </div><br>-->

    <table class="table table-striped table-dark table-responsive-lg">
        <thead>
        <tr>
            <th scope="col">Equipo</th>
            <th scope="col">Tipo Problema</th>
            <th scope="col">Nota</th>
            <th scope="col">Empleado</th>
            <th scope="col">Tecnico asignado</th>
            <th scope="col">Reasignar tecnico</th>
            <th scope="col">Actualizar</th>

        </tr>
        </thead>
        <tbody>

        @foreach($problemas as $prb)
            <tr>
                <td>{{$prb->equipotrabajo->Descripcion}}</td>
                <td>{{$prb->tipo_problema->NombreProblema}}</td>
                <td>{{$prb->NotaProblema}}</td>
                <td>{{$prb['persona'][0]->NomEmp.' '.$prb['persona'][0]->ApPat.' '.$prb['persona'][0]->ApMat}}</td>
                <td> {{$prb['tecnico'][0]->NomEmp.' '.$prb['tecnico'][0]->ApPat.' '.$prb['tecnico'][0]->ApMat}} </td>

                    <form  method="POST" action="/root_asignar1" >
                        @csrf
                        <input type="hidden" name="idp" value="{{$prb->id}}">
                        <td>
                        <select name="emp" class="custom-select">
                            <option value="nachos" selected>Tecnico</option>
                        @foreach($tecs as $tec)
                                <option value="{{$tec->id}}">{{$tec->NomEmp.' '.$tec->ApPat.' '.$tec->ApMat}}</option>
                        @endforeach
                        </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </td>
                    </form>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection





