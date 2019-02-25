@extends('emp.home')

@yield('cssfondo')
<style>
    form{
        font-family: Arial;
        font-size: 12pt;
        color:#e9ff38;
    }
</style>
@section('cssextra')

@endsection

@section('contenido')

    <form method="post" action="/emp_reg">
        {{csrf_field()}}
        @if(Session::has('Mensaje'))
            <div class="alert alert-success animated bouncInUp" role="alert" >
            <strong data-caption-animate="fadeInLeftSmall">{{Session::get("Mensaje")}}</strong>
            </div>
        @endif
        <div class="form-group">
            <label for="prior">Prioridad del problema:</label>
            <select name="prioridad" id="prio" class="form-control">
                <option value="Baja">Baja</option>
                <option value="Media">Media</option>
                <option value="Alta">Alta</option>
            </select>
        </div>
        <br>
        <br>

        <label for="example-date-input" class="col-4 ">Fecha del Problema:</label>

        <input class="form-control" type="date"  id="example-date-input" name="fecha" >
        <br>

        <select name="tipoprob" id="" class="form-control" >
            <option value="0">Tipo de Problema:</option>
            @foreach($TipoProb as $tipo)
                <option value="{{$tipo->id}}">{{$tipo->NombreProblema}}</option>
            @endforeach
        </select>


        <br>
        <select name="equipo" id="" class="form-control" >

            <option value="0">Equipo de trabajo:</option>
            @foreach($Equipos as $equipo)
                <option value="{{$equipo->id}}">{{$equipo->TipoEquipo.'-'.$equipo->Descripcion}}</option>
            @endforeach
        </select>
        <br>
        <div class="form-group">
            <label for="des">Descripción:</label>
            <textarea class="form-control" rows="5" id="des" name="descripcion"></textarea>
        </div>


        <button type="submit" class="btn btn-outline-success float-right">Registrar Problema</button>
        <!--<button type="submit" class="btn btn-outline-success float">¿Tienes problemas con un archivo? - Subelo aquí</button>-->
        <input type="button"     id="1"   name="btndrop"   value="¿Tienes problemas con un archivo? - Subelo aquí" class="btn btn-warning float">
    </form>




    {{--formulatrio para el dropzone--}}
    <form action="/subirarchivo" style="color: black" enctype="multipart/form-data" class="dropzone" id="myDropzone">
        {{csrf_field()}}
        <div class="fallback">
            <input type="file" name="archivo">
        </div>
        <button id="upload" class="btn btn-elegant form-control">SUBIR</button>
    </form>



@endsection
@section('javascript')
    <script src="js/dropzone.js"></script>
    <link rel="stylesheet" type="text/css" href="css/dropzone.css">

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

    <script>
        Dropzone.prototype.defaultOptions.dictDefaultMessage = "Arrastra tu archivo a subir";

        Dropzone.options.practice={
            autoProcessQueue: false,
            autoDiscover: false,
            dictCancelUpload: true,
            parallelUploads: 500,

            init: function() {
                var practice = this;
                $('#upload').click(function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    practice.processQueue();
                });

                this.on("queuecomplete", function (file) {
                    location.reload();
                });
            }
        }
    </script>
@endsection
