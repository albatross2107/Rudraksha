 <?php
$conn= mysqli_connect("localhost", "root", "", "rudra");
$query="SELECT price, count(*) as number FROM feedback GROUP BY price";
$result=mysqli_query($conn, $query);
$query1="SELECT gender, count(*) as number FROM feedback GROUP BY gender";
$result1=mysqli_query($conn, $query1);
$query2="SELECT teaquality, count(*) as number FROM feedback GROUP BY teaquality";
$result2=mysqli_query($conn,$query2);
$query3="SELECT packagequality, count(*) as number FROM feedback GROUP BY packagequality";
$result3=mysqli_query($conn,$query3);



?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['price', 'Number'],
          <?php
          while($row=mysqli_fetch_array($result)){
            echo "['".$row["price"]."', ".$row["number"]."],";
          }
          ?>
          
        ]);

        var options = {
          title: 'Tea Price',
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
      </script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['gender', 'Number'],
          <?php
          while($row=mysqli_fetch_array($result1)){
            echo "['".$row["gender"]."', ".$row["number"]."],";
          }
          ?>
        ]);

        var options = {
          title: 'Gender Ratio',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['teaquality', 'Number'],
          <?php
          while($row=mysqli_fetch_array($result2)){
            echo "['".$row["teaquality"]."', ".$row["number"]."],";
          }
          ?>
        ]);

        var options = {
          title: 'Quality Report',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['packagequality', 'Number'],
          <?php
           while($row=mysqli_fetch_array($result3)){
            echo "['".$row["packagequality"]."', ".$row["number"]."],";
          }
          ?>
          
        ]);

        var options = {
          title: 'Package Quality',
          legend: 'none',
          pieSliceText: 'label',
          slices: {  4: {offset: 0.2},
                    12: {offset: 0.3},
                    14: {offset: 0.4},
                    15: {offset: 0.5},
          },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
      }
    </script>
    
    <link href="style.css" rel="stylesheet" />
  </head>
  <body>
    <img src="./Images/Website Header Strip.png"  width="100%">
    
    <table>
      <tr>
        <td id="piechart" height="500px" width="1000px"></td>
      
        <td id="piechart_3d" height="500px" width="1100px"></td></tr>
        <tr>
        <td id="donutchart" height="500px" width="1000px"></td>
      <td id="piechart1" height="500px" width="1000px"></td>
        </tr>
    </table>

    <footer class="padding_4x">
    <div class="flex">
      <section class="flex-content padding_1x">
        <h3>About the company</h3>
        <div class="about-company">
          <p>A Section 8 Company (Non Profit Organization) under Companies Act 2013, Ministry of Corporate Affairs, Govt. of INDIA.</p>
        <p>GSTIN 04AAJCR5020K1ZH</p>
        </div>
      </section>
      <section class="flex-content padding_1x">
        <h3>Quick Links</h3>
        <a href="#">Privacy Policy</a>
        <a href="#">Copyright Policy</a>
        <a href="#">Cookie Policy</a>
      </section>
      <section class="flex-content padding_1x">
        <h3>Let's Connect</h3>
        <a href="#">Our Mission</a>
        <a href="#">About Us</a>
        <a href="#">Blogs and newsletters</a>
        
      </section>
      <section class="flex-content padding_1x">
        <h3>Follow Us</h3>
        <div class="links">
          <a href="#"><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-twitter"></i></a>
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          
          
        </div>
        
      </section>
      
    </div>
    <div class="flex">
      <section class="flex-content padding_1x">
        <p>Copyright ©2023 All rights reserved</p>
      </section>
    </div>
  </footer>
  </body>

</html>