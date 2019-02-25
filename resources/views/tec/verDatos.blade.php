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
    <form >
    {{csrf_field()}}
        
        <input type="hidden" name="cod" value="">

        <div class="row justify-content-center">
            <div class="col-2">
                <div class="form-group" >
                    <label style="color: yellow">Nombre</label>
                    <p>{{Session::get('persona')->NomEmp}}</p>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group" >
                    <label style="color: yellow">Apellido Paterno</label>
                    <p>{{Session::get('persona')->ApPat}}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-2">
                <div class="form-group">
                    <label style="color: yellow">Apellido Materno</label>
                    <p>{{Session::get('persona')->ApMat}}</p>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label style="color: yellow">Telefono de Red:</label>
                    <p>{{Session::get('persona')->TelRed}}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-2">
                <div class="form-group">
                    <label style="color: yellow">Celular:</label>
                    <p>{{Session::get('persona')->CelEmp}}</p>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label style="color: yellow">Correo:</label>
                    <p>{{Session::get('persona')->EmailEmp}}</p>
                </div>
            </div>
        </div>
        
        <br>
        <div class="row">
            <div class="col-md-4 col-md-offset-4"></div>
            <div class="col-4" >
                <a href="/tec_editar" class="btn btn-outline-warning btn-block">Editar</a>
            </div>
        </div>

    </form>


@endsection


@section('javascript')

@endsection
