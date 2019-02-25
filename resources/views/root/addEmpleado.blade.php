@extends('root.home')
@yield('cssfondo')
@section('cssextra')
    <style>
        h1{ color: #e9ff38; }
    </style>
@endsection

@section('contenido')

<div class="container">
    <div class="login text-white">
        <div class="text-center">
            <h1>Agregar empleado</h1>
            <small><b>NOTA:</b> Se necesita crear una cuenta al empleado para su acceso a esta aplicación.</small>
        </div><br>
        <form action="/root_addPersona" method="POST">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label class="form-text" for="nom">Nombre:</label>
                        <input class="form-control" name="nom" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-text" for="apep">Apellido Paterno:</label>
                        <input class="form-control" name="apeP" type="text">
                    </div>

                    <div class="form-group">
                        <label class="form-text" for="apeM">Apellido Materno:</label>
                        <input class="form-control" name="apeM" type="text">
                    </div>

                    <div class="form-group">
                        <label class="form-text" for="telR">Telefono de red:</label>
                        <input class="form-control" name="telR" type="text">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="form-text" for="telP">Telefono personal:</label>
                        <input class="form-control" name="telP" type="text">
                    </div>

                    <div class="form-group">
                        <label class="form-text" for="mail">Correo</label>
                        <input class="form-control" name="mail" type="text">
                    </div>

                    <div class="form-group">
                        <label for="tper">Tipo de empleado</label>
                        <select class="form-control" name="tper">
                            @foreach ($tpers as $tper)
                                <option value="{{$tper->id}}">{{$tper->Descripcion}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dep">Departamento</label>
                        <select class="form-control" name="dep">
                            @foreach ($deps as $dep)
                                <option value="{{$dep->id}}">{{$dep->NombreDepa}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div><br>

            <div class="form-group">
                <button type="submit" class="btn btn-warning form-control"><b>REGISTRAR EMPLEADO</b></button>
            </div>
            {{ csrf_field() }}
        </form>
    </div>
</div>

@endsection



