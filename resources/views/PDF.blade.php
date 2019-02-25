<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="/css/bootstrap.css">
  <script src="../js/jquery-3.3.1.slim.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="../js/main.js"></script>
  <title></title>
  <link rel="stylesheet" href="">
    <title> </title>


<table class="table table-dark">
        <thead class="thead">
        <tr>
            <th scope="col">id</th>
            <th scope="col">problema</th>
            <th scope="col">descripcion</th>
            <th scope="col">prioridad</th>
            <th scope="col">fecha_prob</th>
            <th scope="col">hora_prob</th>
            <th scope="col">estatus</th>
        </tr>
        </thead>
        <tbody>
        @foreach($seguimiento as $s)
            <tr>
                <th scope="row">{{$s->id}}</th>
                <td>{{$s->problema}}</td>
                <td>{{$s->descripcion}}</td>
                <td>{{$s->prioridad}}</td>
                <td>{{$s->fecha_prob}}</td>
                <td>{{$s->hora_prob}}</td>
                <td>{{$s->estatus}}</td>

            </tr>

        @endforeach
        </tbody>
        
    </table>
    <a href="/pdfdownload" class="btn btn-primary">Descargar</a>
