<?php
$conn= mysqli_connect("localhost", "root", "", "rudra_675");
$query="SELECT price, count(*) as number FROM feedback GROUP BY price";
$result=mysqli_query($conn, $query);
$query1="SELECT gender, count(*) as number FROM feedback GROUP BY gender";
$result1=mysqli_query($conn, $query1);
$query2="SELECT teaquality, count(*) as number FROM feedback GROUP BY teaquality";
$result2=mysqli_query($conn,$query2);
$query3="SELECT packagequality, count(*) as number FROM feedback GROUP BY packagequality";
$result3=mysqli_query($conn,$query3);
$query4="SELECT teabrand, count(*) as number FROM survey GROUP BY teabrand";
$result4=mysqli_query($conn, $query4);


 
$link=mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"rudra_675");
$test=array();
$count=0;
$res=mysqli_query($link,"SELECT profession, teacups_perday, count(*) as number FROM survey GROUP BY profession");
while($row=mysqli_fetch_array($res)){
$test[$count]['label']=$row['profession'];
$test[$count]['y']=$row['teacups_perday'];
$count=$count+1;
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <link href="css/theme.css" rel="stylesheet" media="all">

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

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light1",
	title:{
		text: "Profession VS Tea cups/day"
	},
	axisY: {
		title: "Tea cups per day"
	},
  axisX: {
		title: "Profession"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## cups",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['teabrand', 'Number'],
          <?php
          while($row=mysqli_fetch_array($result4)){
            echo "['".$row["teabrand"]."', ".$row["number"]."],";
          }
          ?>
        ]);

        var options = {
          title: 'Tea Brand',
          is3D: true,
          chartArea:{left:0,top:0,width:"100%",height:"100%"},
          height: 300
        ,width: 300
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d1'));
        chart.draw(data, options);
      }
    </script>



    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Charts</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub">
                            <a href="adminpanel.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        <li>
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-address-card-o menu-icon"></i>Employee Master</a>
                                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                        <li>
                                            <a href="./cvms/addemployee.php"><i class="fa-solid fa-plus"></i>Add Employee</a>
                                        </li>  
                                        <li><a href="./cvms/manageemployee.php"><i class="fa fa-tasks menu-icon"></i>Manage Employee</a>
                                    </li>   
                                    </ul>
                        </li>
                    </ul>   
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="adminpanel.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        <li>
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-address-card-o menu-icon"></i>Employee Master</a>
                                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                        <li>
                                            <a href="./cvms/addemployee.php"><i class="fa-solid fa-plus"></i>Add Employee</a>
                                        </li>  
                                        <li><a href="./cvms/manageemployee.php"><i class="fa fa-tasks menu-icon"></i>Manage Employee</a>
                                    </li>   
                                    </ul>
                        </li>
                     </ul> 
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                   
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Your name</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                               
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">Name</a>
                                                    </h5>
                                                    <span class="email">abc@example.com</span>
                                                </div>
                                            </div>
                                            
                                            <div class="account-dropdown__footer" name="Logout">
                                                <a href="crm.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Siddhi Tea Feedback Analysis</h2>  
                                </div>
                        <div class="row">
                        
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                    <h3 class="title-2 m-b-40">Tea Price Report</h3>
                                    <div class="chartsection"><div id="piechart" height="500px" width="1000px"></div></div>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Gender Ratio</h3>
                                        <div id="piechart_3d" height="500px" width="1100px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Tea Quality Report</h3>
                                        <div id="donutchart" height="500px" width="1000px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Packaging Quality Report</h3>
                                        <div id="piechart1" height="500px" width="1000px"></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        
                        </div>
                    </div>
                </div>  
                <br>  
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Tea Survey Analysis</h2>  
                                </div>
                        <div class="row">                  
                            
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                    <h3 class="title-2 m-b-40">Demand of Tea Brand</h3>
                                    <div id="piechart_3d1" style="display: flex; justify-content:space-evenly;" height="500px" width="1100px"></div>
                                    </div>
                                </div>
                            </div>
                            

                           
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
