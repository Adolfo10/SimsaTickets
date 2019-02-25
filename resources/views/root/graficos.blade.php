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
        $.ajax({
            url: '/root_graficos_data',
            data: {_token: '{{ csrf_token() }}'},
            type: 'GET',
            dataType: 'json',
            error: function (response) {
                console.log(response);
            },
            success: function (response) {
                Highcharts.chart('grafico1', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: '<h1>Reporte anual de problemas</h1>'
                    },
                    subtitle: {
                        text: 'Se muestran los problemas relacionados a los <b>equipos informaticos y sus perifericos</b>.'
                    },
                    xAxis: {
                        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
                    },
                    yAxis: {
                        title: {
                            text: 'Cantidad'
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                    },
                    series: [{
                        name: 'Cantidad de problemas',
                        data: response
                    }]
                });
            }
        });
    });
</script>
<h2 class="text-center text-white">Gráficos</h2>
<div id="grafico1" style="width: 100%; height: 400px;"></div><br>

@endsection

