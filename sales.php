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
	$query = "SELECT app_status,count(*) as number FROM appointment WHERE mua_ic = '".$_SESSION['mua_ic']."' GROUP BY app_status";
	$result = mysqli_query($con,$query);

 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Makeup Artist Finder</title>
    <link rel="shortcut icon" href="img/lipstick.png" type="image/x-icon"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="application/x-javascript">
			addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
		</script>
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- Custom Theme files -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<link href="css/font-awesome.css" rel="stylesheet">
		<script src="js/jquery.min.js"> </script>
		<script src="js/bootstrap.min.js"> </script>

		<script src="js/jquery.metisMenu.js"></script>
		<script src="js/jquery.slimscroll.min.js"></script>
		<!-- Custom and plugin javascript -->
		<link href="css/custom.css" rel="stylesheet">
		<script src="js/custom.js"></script>
		<script src="js/screenfull.js"></script>

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
			title: 'Percentage of Appointments'
		};
		var chart = new google.visualization.PieChart(document.getElementById('piechart'));
		chart.draw(data, options);

		}
		</script>

		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
	  <script src="mors/morris.js"></script>
	  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
	  <script src="mors/lib/example.js"></script>
	  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
	  <link rel="stylesheet" href="mofx/morris.css">



		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	 <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
	 <script src="morris.js-0.5.1/morris.js"></script>
	 <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
	 <script src="morris.js-0.5.1/examples/lib/example.js"></script>

	 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
	 <link rel="stylesheet" href="morris.js-0.5.1/morris.css">



		<script>
			$(function () {
				$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);
				if (!screenfull.enabled) {
					return false;
				}
			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			});
		</script>

		<style>
			.icon {
			   float: none;
			  margin-top: 0;
			}
			.input-group {
				padding-bottom: 0em;
			}
			a.navbar-brand.title {
				font-size: 11px;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<!----->
			<nav class="navbar-default navbar-static-top" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h1><a class="navbar-brand title" href="muaDashboard.php">Makeup Artist Finder</a></h1>
				</div>
				<div class=" border-bottom">
					<div class="full-left">
						<div class="clearfix"> </div>
					</div>


					<!-- Brand and toggle get grouped for better mobile display -->

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="drop-men" >
						<ul class=" nav_1">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret"><?php echo $objResult['mua_name']; ?><i class="caret"></i></span>
                      <?php if($objResult['mua_image'] == null) { ?>
                      <img width="40" height="40" src="img/default.png">
                    <?php } else { ?><img width="40" height="40" src="img/<?php echo $objResult['mua_image']; ?>"> <?php } ?></a>
								<ul class="dropdown-menu " role="menu">
									<li><a href="muaProfile.php"><i class="fa fa-user"></i>Edit Profile</a></li>
									<li><a href="muaChangePassword.php"><i class="fa fa-key"></i>Change Password</a></li>
									<li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->

					<div class="clearfix">

					</div>

          <div class="navbar-default sidebar" role="navigation">
						<div class="sidebar-nav navbar-collapse">
							<ul class="nav" id="side-menu">
								<li>
									<a href="muaDashboard.php" class=" hvr-bounce-to-right">
										<i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboard</span></a>
								</li>
								<li>
									<a href="muaManageApp.php" class=" hvr-bounce-to-right">
										<i class="fa fa-list nav_icon"></i> <span class="nav-label">Manage Appointment</span></a>
								</li>
								<li>
									<a href="muaReport.php" class=" hvr-bounce-to-right">
										<i class="fa fa-clipboard nav_icon"></i> <span class="nav-label">Report</span></a>
								</li>


							</ul>
						</div>
					</div>
				</div>
			</nav>


			<div id="page-wrapper" class="gray-bg dashbard-1">
				<div class="content-main">

					<!--banner-->
					<div class="banner">
						<h2>
							<a href="muaDashboard.php">Home</a>
							<i class="fa fa-angle-right"></i>
							<span>Report</span>
						</h2>
					</div> <br>



					<div class="content-bottom">
						<div class="col-md-12 post-top">


							<?php


													$month = array('%2018-01%' , '%2018-02%' ,'%2018-03%' ,'%2018-04%' ,'%2018-05%' ,'%2018-06%' ,'%2018-07%' ,'%2018-08%' ,'%2018-09%' ,'%2018-10%' ,'%2018-11%' ,'%2018-12%' ,);
													$data = array();

													for ( $i =0;$i<12;$i++){
														$result = mysqli_query($con,
														// "SELECT sum(total_charge) as ccount FROM `appointment` where app_date like '$month[$i]' AND app_status='CONFIRMED'
														// AND mua_ic = '".$_SESSION['mua_ic']."' GROUP BY app_date"
														"SELECT count(*) as ccount FROM `appointment` where app_date like '$month[$i]' AND app_status='CONFIRMED'
														AND mua_ic = '".$_SESSION['mua_ic']."' "
														);
														$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
														$data[$i] = $row["ccount"];

													}


								?>


</div>

<div align='center'>
<div class="col-md-6 ">
<div class="content-top-1">
<div class="col-md-12 top-content">
<center>
				<?php

			$sql="SELECT count(app_status) as app_status FROM appointment WHERE app_status = 'CONFIRMED' AND mua_ic = '".$_SESSION['mua_ic']."'";
			$query=mysqli_query($con,$sql);
			$resultData=mysqli_fetch_assoc($query);

?>
				<label> <?php echo $resultData['app_status']; ?></label>
				<h7>
				<p>Confirmed Appointments</p>
				</h7>
</center>
</div>
<div class="clearfix"> </div>
</div>
</div>
</div>


<center>
<div class="col-md-6 ">
<div class="content-top-1">
<div class="col-md-12 top-content">
<center>
				<?php

			$sql="SELECT sum(total_charge) as total FROM `appointment` where app_status='CONFIRMED'
			AND mua_ic = '".$_SESSION['mua_ic']."' ";
			$query=mysqli_query($con,$sql);
			$resultData=mysqli_fetch_assoc($query);

?>
				<label>RM <?php echo $resultData['total']; ?></label>
				<h7>
				<p>Overall Amount of Total Charge</p>
				</h7>
</center>
</div>
<div class="clearfix"> </div>
</div>
 </div>
</center>




<div class="clearfix"> </div>
<br><br>

					<h3>Total Number of Confirmed Appointment</h3>
					<br>

					<div id="graph"></div>
					<br>



					<br><br>
					<div id="piechart" style="width: 1500px; height: 500px;"></div>

</div>
</div>
</div>


					<link rel="stylesheet" type="text/css" href="css/calendar.css" />
					<link rel="stylesheet" type="text/css" href="css/custom_1.css" />
					<script type="text/javascript" src="js/jquery.calendario.js"></script>
					<script type="text/javascript" src="js/data.js"></script>
					<script type="text/javascript">
					$(function() {

					var cal = $( '#calendar' ).calendario( {
						onDayClick : function( $el, $contentEl, dateProperties ) {

							for( var key in dateProperties ) {
								console.log( key + ' = ' + dateProperties[ key ] );
							}

						},
						caldata : codropsEvents
					} ),
					$month = $( '#custom-month' ).html( cal.getMonthName() ),
					$year = $( '#custom-year' ).html( cal.getYear() );

					$( '#custom-next' ).on( 'click', function() {
					cal.gotoNextMonth( updateMonthYear );
					} );
					$( '#custom-prev' ).on( 'click', function() {
					cal.gotoPreviousMonth( updateMonthYear );
					} );
					$( '#custom-current' ).on( 'click', function() {
					cal.gotoNow( updateMonthYear );
					} );

					function updateMonthYear() {
					$month.html( cal.getMonthName() );
					$year.html( cal.getYear() );
					}



					});
					</script>

					<!--scrolling js-->
					<script src="js/jquery.nicescroll.js"></script>
					<script src="js/scripts.js"></script>
					<!--//scrolling js-->
					<script>
					Morris.Bar({
					  element: 'graph',
					  data: [
					    {x: 'Jan', y: <?php echo $data[0];?>},
					    {x: 'Feb', y: <?php echo $data[1];?>},
					    {x: 'Mar', y: <?php echo $data[2];?>},
					    {x: 'Apr', y: <?php echo $data[3];?>},
							{x: 'May', y:<?php echo $data[4];?>},
							{x: 'June', y: <?php echo $data[5];?>},
							{x: 'July', y: <?php echo $data[6];?>},
							{x: 'Aug', y: <?php echo $data[7];?>},
							{x: 'Sept', y: <?php echo $data[8];?>},
							{x: 'Oct', y: <?php echo $data[9];?>},
							{x: 'Nov', y: <?php echo $data[10];?>},
							{x: 'Dec', y: <?php echo $data[11];?>}
					  ],
					  xkey: 'x',
					  ykeys: ['y'],
					  labels: ['Total Appointment']
					}).on('click', function(i, row){
					  console.log(i, row);
					});
					</script>
					</body>
					</html>
