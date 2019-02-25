<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta charset="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/highcharts.js"></script>
    <script src="/js/modules/exporting.js"></script>
    <script src="/js/modules/offline-exporting.js"></script>
    <script src="/js/dropzone.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar1.css">
    @yield('cssextra')
    @section('cssfondo')
        <style>
                 
            body{
                background-image: linear-gradient(
                    rgba(0, 0, 0, 0.4),
                    rgba(0, 0, 0, 0.4)
                ), url('img/login_bg.png');
                background-position: top;
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;
            }
            #usuario{
                height: 100px;
                width: 100px;
            }
            .titulo{
                margin: auto;
                font-size: 40px;
            }
            @media only screen and (min-width: 800px){
                #abrir{
                    display: none;
                    width: 500px;
                    height: 20px;
                }
                #dismiss{
                    visibility: visible;
                    background-color: yellow;
                }
            }
            
            @media only screen and (max-width: 492px){
                .titulo{
                    font-size: 30px;
                }
            }
            .card{
                background-color: rgb(37, 42, 71);
                max-width: 100%;
            }
            .card-img img{
                max-width: 22rem;
                border-radius: 25px;
            }
        </style>
    @show
    <title>Tickets Simsa</title>
    <link rel="icon" type="image/png" href="/img/simsaico.ico">
</head>
<body>

<div class="wrapper">
    {{--sidebar--}}
    <nav id="sidebar" class="">

        <button id="dismiss" class="btn overlay">
            <img src="img/flecha-hacia-la-izquierda.png" width="15" height="15">
        </button>

        <div class="sidebar-header text-center">
            <p style="padding-left: 5px;" ><img id="usuario" src="img/temp/users/{{Session::get('img')}}.png" alt="avatar">
                <br><b><strong style="color: black">{{Session::get('persona')->NomEmp}}</strong></b><br><small style="color: black">{{Session::get('tipoPer')}}</small>
            </p>
        </div>

        <ul class="list-unstyled components">
            <p><strong>Panel de control</strong></p>
            @section('botones')
            @show
        </ul>
        <ul class="list-unstyled CTAs">
            <li>
                <a href="/cerrarSesion" class="btn btn-warning" style="color: black;">Cerrar sesion</a>
            </li>
        </ul>
    </nav>

    {{--navbar--}}
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <!-- Just an image -->
                <a class="navbar-brand">
                    <img src="img/simsaico.ico" width="60" height="50" alt="Logo">
                </a>

                <button type="button" class="btn btn-lg btn-light" id="abrir">
                    <img src="img/menu.png" width="50" height="50" id="menu" alt="imagen menu">
                </button>


                <strong class="titulo">Simsa Tickets</strong>

                <a class="navbar-brand mr-sm-2 d-none d-md-block">
                    <!--<img src="img/icons8-información-48.png" width="50" height="50" alt="">-->
                    <img src="img/simsaico.ico" width="60" height="50" alt="Logo">
                </a>
            </div>
        </nav>
        @section('contenido')
            
        @show
    </div>
    <div class="overlay"></div>
</div>

<script src="js/bootstrap.js"></script>
<script src="js/popper.min.js"></script>
@yield('javascript')
</body>
</html>
