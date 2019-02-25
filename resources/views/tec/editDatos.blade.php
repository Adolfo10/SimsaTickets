@extends('tec.home')

@yield('cssfondo')

@section('cssextra')
    <style>
        form{
            font-family: Arial;
            font-size: 12pt;
            color:#e9ff38;
        }
        .row p{
            color: white;
            font-size: 26px;
        }
    </style>
@endsection

@section('contenido')
    <form action="/tec_actualizar" method="POST">
     {{csrf_field()}}

        <div class="row">
            <div class="col-6">
                <div class="form-group" >
                    <label for="nom" style="color: yellow">Nombre</label>
                    <input type="text" id="nom" name="NomEmp" value="{{Session::get('persona')->NomEmp}}" class="form-control">
                </div>
            </div>
            
            <div class="col-6">
                <div class="form-group" >
                    <label for="app" style="color: yellow">Apellido Paterno</label>
                    <input type="text" id="app" name="ApPat" value="{{Session::get('persona')->ApPat}}" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="apm" style="color: yellow">Apellido Materno</label>
                    <input type="text" id="apm" name="ApMat" value="{{Session::get('persona')->ApMat}}" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="telred" style="color: yellow">Telefono Red</label>
                    <input type="text" id="telred" name="TelRed" value="{{Session::get('persona')->TelRed}}" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="telcel" style="color: yellow">Celular</label>
                    <input type="text" id="telcel" name="CelEmp" value="{{Session::get('persona')->CelEmp}}" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="correo" style="color: yellow">Email</label>
                    <input type="text" id="correo" name="EmailEmp" value="{{Session::get('persona')->EmailEmp}}" class="form-control">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4 col-md-offset-4"></div>
            <div class="col-4" >
                <button type="submit" class="btn btn-warning btn-block">Guardar</button>
            </div>
        </div>
    
    </form>

@endsection
@section('javascript')
@endsection    
