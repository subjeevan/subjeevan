<!doctype html>
<html>
  <head>
  <title>Bar Chart</title>
  <script src="http://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
  <script src="http://www.chartjs.org/samples/latest/utils.js"></script>
  <style>
  canvas {
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
  }
  </style>
  </head>
  <body>
    <div id="container" style="width: 55%;">
    <canvas id="canvas"></canvas>
    </div>
    <script>
    var chartdata = {
    type: 'bar',
    data: {
    labels: <?php echo json_encode($date,JSON_NUMERIC_CHECK) ?>,
    // labels: month,
    datasets: [
    {
    label: '',
    backgroundColor: '#26B99A',
    borderWidth: 1,
    data: {!! $claim_code !!}
    }
    ]
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
    }
    var ctx = document.getElementById('canvas').getContext('2d');
    new Chart(ctx, chartdata);
    </script>
  </body>
</html>