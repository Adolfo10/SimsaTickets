@extends('root.home')

 @yield('cssfondo')

@section('cssextra')
    <style>
        .l{
            color: #e9ff38;
            font-family: Arial;
            font-size: 12pt;
        }
    </style>
    @endsection

@section('contenido')

    <h1 class="text-center" style="color: #e9ff38" >Asignación De Problemas</h1>
    <form action="/root_asignProblema" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1" class="l">Seleccione Problema</label>
            <select name="problem" class="form-control" id="exampleFormControlSelect1">
                <option selected>Seleccione</option>
                @foreach($prob as $problem)
                <option value="{{$problem->id}}">{{$problem->NotaProblema}}</option>
                    @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1" class="l">Sleccione Tecnico</label>
            <select name= "tecnic" class="form-control" id="exampleFormControlSelect1">
                <option  selected>Seleccione</option>
                @foreach($tec as $tecn)
                    <option value="{{$tecn->id}}">{{$tecn->NomEmp.' '.$tecn->ApPat.' '.$tecn->ApMat}}</option>
                    @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success float-right">Guardar</button>
    </form>
@endsection


 @section('javascript')
@endsection
