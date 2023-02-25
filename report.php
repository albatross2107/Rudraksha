<?php
$conn= mysqli_connect("localhost", "root", "", "rudra");
$query1="SELECT teaquality, count(*) as number FROM feedback GROUP BY teaquality";
$query2="SELECT price, count(*) as number FROM feedback GROUP BY price";

$result1=mysqli_query($conn, $query1);
$result2=mysqli_query($conn, $query2);

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['teaquality', 'Number'],
          <?php
          while($row=mysqli_fetch_array($result1)){
            echo "['".$row["teaquality"]."', ".$row["number"]."],";
          }
          ?>
          
        ]);

        var options = {
          title: 'Tea Quality',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['price', 'Number'],
          
          <?php
          while($row=mysqli_fetch_array($result2)){
            echo "['".$row["price"]."', ".$row["number"]."],";
          }
          ?>
        ]);

        var options = {
          title: 'Price',
          is3D: true,
          colors:['green','blue', 'purple'],
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>


  </head>
  <body>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    
  </body>
</html>