@extends('plantillas.resources')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta charset="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    @section('ico_css') @parent
        <link rel="stylesheet" href="/css/login.css">
    @endsection

    @section('js_fonts') @parent @endsection

    <title>[SimsaTickets] Inicio de sesión</title>
    <link rel="icon" type="image/png" href="/img/simsaico.ico">
</head>

<body>
    <div class="container">
        <div class="box row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-6">
                        <img id="bg" src="img/simsa_adolf.jpg" alt="Back">
                    </div>
                    <div class="col-6 form" style="background-color: white;">
                        <div class="text-center"><img id="logo" src="img/simsa.png" alt="Logo"></div>
                        <h4 class="text-center">Inicio de sesión</h4>
                            @if(Session::has('Error'))                                
                                <div class="alert alert-danger animated shake" role="alert">
                                <strong data-caption-animate="fadeInLeftSmall">{{Session::get("Error")}}</strong>  
                                </div>
                            @endif

                             @if(Session::has('Adios'))                                
                                <div class="alert alert-success animated shake" role="alert">
                                <strong data-caption-animate="fadeInLeftSmall">{{Session::get("Adios")}}</strong>  
                                </div>
                            @endif

                        <form action="{{ url("/login") }}" method="POST" >
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="NomUsuario">Nombre de usuario:</label>
                            <input name="NomUsuario" type="text" class="form-control">
                            {!! $errors->first('NomUsuario',
                            '<div class="alert alert-danger animated bouncInUp" role"alert"> 
                            <strong data-caption-animate="fadeInLeftSmall">:message</strong> 
                            </div>') !!}
                        </div>


                        <div class="form-group">

                            <label for="PassUsuario">Contraseña:</label>
                            <input 
                            name="PassUsuario" 
                            type="password" 
                            class="form-control">
                            <br>
                            {!! $errors->first('PassUsuario', 
                            '<div class="alert alert-danger animated bouncInUp" role"alert">
                              <strong data-caption-animate="fadeInLeftSmall">:message</strong>  
                              </div>
                            ') !!}

                        </div>

                            <button type="submit" class="btn btn-primary form-control">INICIAR SESIÓN</button>
                                
                        </form>                                

                    </div>
                </div>
            </div>            
            <div class="col-md-2"></div>
        </div>
        
        <p id="info" class="text-center">TICKETS SIMSA</p>
    </div>
</body>
</html>