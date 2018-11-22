@extends('layouts.adminlte')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inicio</div>

                <div class="panel-body">
                        <canvas id="myChart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("script")
{{-- 
{{-- <script src='{{ asset("node_modules/chart.js/dist/Chart.bundle.js")}}'></script>
<script src='{{ asset("node_modules/chart.js/dist/Chart.bundle.min.js")}}'></script> --}}
{{-- <script src='{{ asset("node_modules/chart.js/dist/Chart.js")}}'></script> --}}
{{-- <script src='{{ asset("node_modules/chart.js/dist/Chart.min.js")}}'></script> --}}
<script>
// $( document ).ready(function() {
    var cantidad = <?php echo($consulta->cantidad)  ?> ;
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Octubre","Noviembre"],
            datasets: [{
                label: '# de Pacientes',
                data: [1,cantidad],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
// });
    
</script> 
@endsection