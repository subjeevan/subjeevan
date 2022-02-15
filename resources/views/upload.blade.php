<?php>

<html>
  
{{($date)
}}

<br>

{{dd ($claim_code)
}}

@extends('layouts.app')  
  
@section('content') 




<script src="https://raw.githubusercontent.com/nnnick/Chart.js/master/dist/Chart.bundle.js"></script>  
<script>  

    var year = {{$date}};  
    var data_claim_code = {{$claim_code}};  
    
  
    var barChartData = {  
        labels: year,  
        datasets: [{  
            label: 'claim_code',  
            backgroundColor: "rgba(220,220,220,0.5)",  
            data: data_claim_code  
        }]  
    };  
  
    window.onload = function() {  
        var ctx = document.getElementById("canvas").getContext("2d");  
        window.myBar = new Chart(ctx, {  
            type: 'bar',  
            data: barChartData,  
            options: {  
                elements: {  
                    rectangle: {  
                        borderWidth: 2,  
                        borderColor: 'rgb(0, 255, 0)',  
                        borderSkipped: 'bottom'  
                    }  
                },  
                responsive: true,  
                title: {  
                    display: true,  
                    text: 'Yearly Website Visitor'  
                }  
            }  
        });  
  
    };  
</script>  
  
<div class="container">  
    <div class="row">  
        <div class="col-md-10 col-md-offset-1">  
            <div class="panel panel-default">  
                <div class="panel-heading">Dashboard</div>  
                <div class="panel-body">  
                    <canvas id="canvas" height="280" width="600"></canvas>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  

@endsection

<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets /script/canvasjs.min.js"></script>
</body>
</html>                     

<?>