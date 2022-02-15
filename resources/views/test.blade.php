<?php>

<html>
<head>  




<table>


  <tr>

    <th>MR_NO</th>
    <th>Claim Date</th>
    <th>Country</th>
  </tr>

@foreach($all as $student)
     
  <tr>
    <td>{{$student->mr_no}}</td>
    <td>{{\Carbon\Carbon::parse($student->updated_at)->toDateString() }}</td>
    <td> </td>
  </tr>
@endforeach
</table>


<table>


  <tr>

    <th>MR_NO</th>
    <th>Claim Date</th>
    <th>Country</th>
  </tr>

@foreach($view as $student)
     
  <tr>
    <td>{{$student->Date}}</td>
    <td>{{$student->claim_code}}</td>
    <td> </td>
  </tr>
@endforeach
</table>


</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets /script/canvasjs.min.js"></script>
</body>
</html>                     

?>