<?php require_once("config.php"); ?>
<?php
	session_start();
	if($_SESSION['mua_ic'] == "")
	{
    echo "<script>alert('Please Login!');";
    echo "window.location.href = 'index.php';</script>";
		exit();
	}


	$strSQL = "SELECT * FROM makeupartist WHERE mua_ic = '".$_SESSION['mua_ic']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);

?>

<?php

	include 'config.php';
	$query = "SELECT app_status,count(*) as number FROM appointment GROUP BY app_status";
	$result = mysqli_query($con,$query);

 ?>

<!DOCTYPE HTML>
<html>

<head>

  <script src="https://www.gstatic.com/charts/loader.js"></script>
  <script>
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart()
  {
    var data = google.visualization.arrayToDataTable([
      ['Appointment','Number'],
    <?php
    while($row = mysqli_fetch_array($result))
    {
      echo "['".$row["app_status"]."', ".$row["number"]."],";
    }
     ?>
  ]);
  var options = {
    title: 'Percentage'
  };
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);

  }
  </script>


	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
 <script src="morris.js-0.5.1/morris.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
 <script src="morris.js-0.5.1/examples/lib/example.js"></script>

 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
 <link rel="stylesheet" href="morris.js-0.5.1/morris.css">

</head>

<body>

<div style="width:900px;">

<div id="piechart" style="width: 900px; height: 500px;"></div>


<div id="graph"></div>

<?php
  require 'config.php';




  $month = array ('01',
           '02',
           '03',
           '04',
           '05',
           '06',
           '07',
           '08',
           '09',
           '10',
           '11',
           '12');


  $dataPoints = array();
  for ($i = 0; $i < sizeof($month); $i++)

    {

      $sel_query="Select *
    from appointment pd
    where mua_ic = '".$_SESSION['mua_ic']."'
      AND EXTRACT(month from app_date) = '$month[$i]' ";
					 $result = mysqli_query($con,$sel_query);

        $total=0;
      while($row2= mysqli_fetch_array($result))
      {
        //echo $row2['PRODUCT_PRICE'];
        //echo $row2["ORDERS_QUANTITY"];
     $uprice = $row2['total_charge'];//  * $row2['ORDERS_QUANTITY'];
       $total= $total +  $uprice;


      //$_SESSION['super'] = $super;

    }


      //$count = $row1['COUNT'];

       $dataPoints[$i] = $total ;


    }



?>


<script>

Morris.Bar({
  element: 'graph',
  data: [


   {x: 'January', y: <?php echo $dataPoints[0];?>},
    {x: 'February', y: <?php echo $dataPoints[1];?>},
    {x: 'March', y: <?php echo $dataPoints[2];?>},
    {x: 'April', y: <?php echo $dataPoints[3];?>},
    {x: 'May', y: <?php echo $dataPoints[4];?>},
    {x: 'Jun', y: <?php echo $dataPoints[5];?>},
    {x: 'July', y: <?php echo $dataPoints[6];?>},
    {x: 'August', y: <?php echo $dataPoints[7];?>},
    {x: 'September', y: <?php echo $dataPoints[8];?>},
  {x: 'October', y: <?php echo $dataPoints[9];?>},
  {x: 'November', y: <?php echo $dataPoints[10];?>},
  {x: 'December', y: <?php echo $dataPoints[11];?> }
  ],
  xkey: 'x',
  ykeys: ['y'],
  labels: ['Total sales'],

  barColors: function (row, series, type) {
    if (type === 'bar') {
      var red = Math.ceil(255 * row.y / this.ymax);
      return 'rgb(' + red + ',0,0)';
    }
    else {
      return '#000';
    }
  }
});
</script>

</body>

</html>
