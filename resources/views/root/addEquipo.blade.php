@extends('root.home')

@yield('cssfondo')

@section('cssextra')
    <style>
        form{
            font-family: Arial;
            font-size: 12pt;
            color:#e9ff38;
        }
        h3{ color: #e9ff38; }
    </style>
@endsection

@section('contenido')
    <div class="text-center">
        <h3>Agregar equipo de trabajo</h3>
    </div><br>
    <form method="POST" action="/root_addEquipo">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripción:</label>
            <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Numero de Serie:</label>
            <input name="seri" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Numero de serie">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo de Equipo:</label>
            <select  name="tpe" class="form-control" id="exampleFormControlSelect1">
                <option value="Laptop">Laptop</option>
                <option value="Escritorio">Escritorio</option>
                <option value="Impresora">Impresora</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Persona:</label>
            <select class="form-control"  name="per"  >
                <option>Seleccione:</option>
                @foreach($per as $persona)
                    <option value="{{$persona->id}}">{{$persona->NomEmp.' '.$persona->ApPat.' '.$persona->ApMat}}</option>

                    @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-warning float-right">Guardar</button>
    </form>
@endsection



