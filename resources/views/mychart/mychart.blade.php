@extends('adminlte::page')

@section('content')
<div class="container">

<?php
//echo '<pre>'; print_r($results); 
?>
<div id="piechart">piechart</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ["<?php echo $results['0']->subject; ?>", <?php echo $results['0']->marks; ?>],
  ["<?php echo $results['1']->subject; ?>", <?php echo $results['1']->marks; ?>],
  ["<?php echo $results['2']->subject; ?>", <?php echo $results['2']->marks; ?>],
  ["<?php echo $results['3']->subject; ?>", <?php echo $results['3']->marks; ?>],
  ["<?php echo $results['4']->subject; ?>", <?php echo $results['4']->marks; ?>],
  ["<?php echo $results['5']->subject; ?>", <?php echo $results['5']->marks; ?>]
]);

  // Optional; add a title and set the width and height of the chart

  
  var options = {'title':'My Examination Result', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>



@endsection