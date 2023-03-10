<?php
 

 
$link=mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"rudra_675");
$test=array();
$count=0;
$res=mysqli_query($link,"SELECT profession, quantity_permonth, count(*) as number FROM survey GROUP BY profession");
while($row=mysqli_fetch_array($res)){
$test[$count]['label']=$row['profession'];
$test[$count]['y']=$row['quantity_permonth'];
$count=$count+1;
}



?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 var chart = new CanvasJS.Chart("chartContainer", {
	 animationEnabled: true,
	 title:{
		 text: "Profession vs Quantity_permonth"
	 },
	 axisY: {
		 title: "Quantity_permonth",
		 includeZero: true,
		 prefix: "$",
		 suffix:  "k"
	 },
	 data: [{
		 type: "bar",
		 yValueFormatString: "$#,##0K",
		 indexLabel: "{y}",
		 indexLabelPlacement: "inside",
		 indexLabelFontWeight: "bolder",
		 indexLabelFontColor: "white",
		 dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	 }]
 });
 chart.render();
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                              