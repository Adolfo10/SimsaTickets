@extends('root.home')
@yield('cssfondo')

@section('cssextra')
<style>
    h1{ color: #e9ff38; }
</style>
@endsection
@section('contenido')

<script>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
    $(document).ready(function(){
        $('#add').click(function(){
            var div_msj = $('#mensaje');
            div_msj.empty();

            var person_id = $("select[name='tper']").val(),
            nom = $("input[name='nom']").val(),
            pass = $("input[name='pass']").val()
            _token = '{{ csrf_token() }}';

            $.ajax({
                url: '/root_addUsuario',
                data: {person_id, nom, pass, _token},
                type: 'POST',
                dataType: 'json',
                error: function (response) {
                    console.log(response);
                },
                success: function (response) {
                    var msj;

                    if(response.reg){
                        $("select[name='tper'] option:selected").remove();
                        msj = "<div class='alert alert-success alert-dismissible fade show text-center'>"+response.msj+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                    }  
                    else
                        msj = "<div class='alert alert-danger alert-dismissible fade show text-center'>"+response.msj+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                    
                    div_msj.append(msj);
                }
            });
        });
    });
</script>

<div class="container">
    <div class="login text-white">
        <div class="text-center">
            <h1>Añadir usuario</h1>
            <small><b>NOTA: </b>Sólo se pueden crear usuarios para los empleados registrados.</small>
        </div><br>

            <div class="row">
                <div class="col-md-3"></div>
                    <div class="col-md-6 form-group">
                        <div class="text-center"><label for="tper">Selecciona al empleado:</label></div>
                        <select class="form-control" name="tper">
                            @foreach ($empleados as $emp)
                                <option value="{{$emp->id}}">{{$emp->id.'. '.$emp->NomEmp.' '.$emp->ApPat.' '.$emp->ApMat}}</option>
                            @endforeach
                        </select>
                    <div class="text-left"><small>Empleados que <b>no</b> tienen asignada una cuenta de usuario.</small></div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <label for="nom">Nombre de usuario:</label>
                    <input class="form-control" name="nom" type="text">
                </div>
                <div class="col form-group">
                    <label for="pass">Contraseña:</label>
                    <input class="form-control" name="pass" type="password">
                </div>
            </div><br>
    
            <div class="form-group">
                <button id="add" class="btn btn-warning form-control"><b>AÑADIR USUARIO</b></button>
            </div>
            {{ csrf_field() }}
            <div class="form-group" id="mensaje"></div>
    </div>
</div>

@endsection

