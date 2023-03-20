<?php
$conn= mysqli_connect("localhost", "root", "", "rudra_675");
$query1="SELECT teabrand, count(*) as number FROM survey GROUP BY teabrand";
$result1=mysqli_query($conn, $query1);


?>

<!DOCTYPE html>
<html lang="en">

<head>
	
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['teabrand', 'Number'],
          <?php
          while($row=mysqli_fetch_array($result1)){
            echo "['".$row["teabrand"]."', ".$row["number"]."],";
          }
          ?>
        ]);

        var options = {
          title: 'Tea Brand',
          is3D: true,
		  chartArea:{left:0,top:0,width:"100%",height:"100%"}
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
<div id="piechart_3d" height="500px" width="1100px"></div>

</body>
</html>