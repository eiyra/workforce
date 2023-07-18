<html>
	<head>
		<script src="jquery-2.1.4.min.js"></script>
		<script src="Chart.js"></script>
		
		
		<style type="text/css">
			#chart-container {
				width: 100%;
				height: auto;
			}
		</style>
		
	</head>
	<body>
		<div id="chart-container">
			
			<?php
			if ((isset($_POST['searchYear']))) {
				if ($_POST['Year']) {
					$Year = $_POST['Year'];
				}
				include '../../config/config.php';

				$query1 = "SELECT COUNT(item_id) FROM recycle WHERE Month(appointment_date)='1' AND YEAR(appointment_date)='$Year'";
				$result1 = mysqli_query($con, $query1);
				$row1 = mysqli_fetch_row($result1);

				$query2 = "SELECT COUNT(appointment_id) FROM appointment WHERE Month(appointment_date)='2' AND YEAR(appointment_date)='$Year'";
				$result2 = mysqli_query($con, $query2);
				$row2 = mysqli_fetch_row($result2);

				$query3 = "SELECT COUNT(appointment_id) FROM appointment WHERE Month(appointment_date)='3' AND YEAR(appointment_date)='$Year'";
				$result3 = mysqli_query($con, $query3);
				$row3 = mysqli_fetch_row($result3);

				$query4 = "SELECT COUNT(appointment_id) FROM appointment WHERE Month(appointment_date)='4' AND YEAR(appointment_date)='$Year'";
				$result4 = mysqli_query($con, $query4);
				$row4 = mysqli_fetch_row($result4);

				$query5 = "SELECT COUNT(appointment_id) FROM appointment WHERE Month(appointment_date)='5' AND YEAR(appointment_date)='$Year'";
				$result5 = mysqli_query($con, $query5);
				$row5 = mysqli_fetch_row($result5);

				$query6 = "SELECT COUNT(appointment_id) FROM appointment WHERE Month(appointment_date)='6' AND YEAR(appointment_date)='$Year'";
				$result6 = mysqli_query($con, $query6);
				$row6 = mysqli_fetch_row($result6);

				$query7 = "SELECT COUNT(appointment_id) FROM appointment WHERE Month(appointment_date)='7' AND YEAR(appointment_date)='$Year'";
				$result7 = mysqli_query($con, $query7);
				$row7 = mysqli_fetch_row($result7);

				$query8 = "SELECT COUNT(appointment_id) FROM appointment WHERE Month(appointment_date)='8' AND YEAR(appointment_date)='$Year'";
				$result8 = mysqli_query($con, $query8);
				$row8 = mysqli_fetch_row($result8);

				$query9 = "SELECT COUNT(appointment_id) FROM appointment WHERE Month(appointment_date)='9' AND YEAR(appointment_date)='$Year'";
				$result9 = mysqli_query($con, $query9);
				$row9 = mysqli_fetch_row($result9);

				$query10 = "SELECT COUNT(appointment_id) FROM appointment WHERE Month(appointment_date)='10' AND YEAR(appointment_date)='$Year'";
				$result10 = mysqli_query($con, $query10);
				$row10 = mysqli_fetch_row($result10);

				$query11 = "SELECT COUNT(appointment_id) FROM appointment WHERE Month(appointment_date)='11' AND YEAR(appointment_date)='$Year'";
				$result11 = mysqli_query($con, $query11);
				$row11 = mysqli_fetch_row($result11);

				$query12 = "SELECT COUNT(appointment_id) FROM appointment WHERE Month(appointment_date)='12' AND YEAR(appointment_date)='$Year'";
				$result12 = mysqli_query($con, $query12);
				$row12 = mysqli_fetch_row($result12);
			}
			?>

			<canvas id="mycanvas" width="600" height="200">
				<script>
					var barData = {
						labels : ["January","February","March","April","May","June","July","August","September","October","November","Disember"],
						datasets : [
							{
									   
								data : [<?php echo $row1[0]; ?>,<?php echo $row2[0]; ?>,<?php echo $row3[0]; ?>,<?php echo $row4[0]; ?>,<?php echo $row5[0]; ?>,<?php echo $row6[0]; ?>,<?php echo $row7[0]; ?>,<?php echo $row8[0]; ?>,<?php echo $row9[0]; ?>,<?php echo $row10[0]; ?>,<?php echo $row11[0]; ?>,<?php echo $row12[0]; ?>]
							}		
						]
					}
					
					window.onload = function(){
						var mycanvas = document.getElementById("mycanvas").getContext("2d");
						// draw bar chart
						window.myObjBar = new Chart(mycanvas).Bar(barData, {responsive :true});
						myObjBar.datasets[0].bars[0].fillColor = "lightblue"; //bar 1
						//bar 3
						myObjBar.update()
					};
						// get bar chart canvas
						   
						// draw bar chart		
				</script>
			</canvas>
		</div>
	</body>
</html>