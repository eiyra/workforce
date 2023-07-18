<?php require_once("config.php"); ?>
<?php
	session_start();
	if($_SESSION['customer_ic'] == "")
	{
    echo "<script>alert('Please Login!');";
    echo "window.location.href = 'index.php';</script>";
		exit();
	}


	$strSQL = "SELECT * FROM customer WHERE customer_ic = '".$_SESSION['customer_ic']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);

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

		<!-- Mainly scripts -->
		<script src="js/jquery.metisMenu.js"></script>
		<script src="js/jquery.slimscroll.min.js"></script>
		<!-- Custom and plugin javascript -->
		<link href="css/custom.css" rel="stylesheet">
		<script src="js/custom.js"></script>
		<script src="js/screenfull.js"></script>
		<script>

		</script>



		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
	  <script src="mors/morris.js"></script>
	  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
	  <script src="mors/lib/example.js"></script>
	  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
	  <link rel="stylesheet" href="mofx/morris.css">
  	<script type="text/javascript" src="https://www.google.com/jsapi"></script>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

		<script>
		$(document).ready( function ()
		{
		$('#example').DataTable();
		} )
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
					<h1><a class="navbar-brand title" href="customerDashboard.php">Makeup Artist Finder</a></h1>
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
								<a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret"><?php echo $objResult['customer_name']; ?><i class="caret"></i></span>
                      <?php if($objResult['customer_image'] == null) { ?>
                      <img width="40" height="40" src="img/default.png">
                    <?php } else { ?><img width="40" height="40" src="img/<?php echo $objResult['customer_image']; ?>"> <?php } ?></a>
								<ul class="dropdown-menu " role="menu">
									<li><a href="customerProfile.php"><i class="fa fa-user"></i>Edit Profile</a></li>
<li><a href="customerChangePassword.php"><i class="fa fa-key"></i>Change Password</a></li>
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
									<a href="customerDashboard.php" class=" hvr-bounce-to-right">
										<i class="fa fa-search nav_icon "></i><span class="nav-label">Finder</span></a>
								</li>
								<li>
									<a href="customerMuaList.php" class=" hvr-bounce-to-right">
										<i class="fa fa-list nav_icon"></i> <span class="nav-label">List of Makeup Artist</span></a>
								</li>
								<li>
									<a href="customerCheckApp.php" class=" hvr-bounce-to-right">
										<i class="fa fa-list nav_icon"></i> <span class="nav-label">Check Appointment</span></a>
								</li>
								<li>
									<a href="customerHistory.php" class=" hvr-bounce-to-right">
										<i class="fa fa-list nav_icon"></i> <span class="nav-label">Appointment History</span></a>
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
							<a href="customerDashboard.php">Home</a>
							<i class="fa fa-angle-right"></i>
							<span>Appointment History</span>
						</h2>
					</div>

<br><br>


            <div id="columnchart" style="width:100%;"></div>




            <?php
            include 'config.php';

            $sessions = $_SESSION['customer_ic'];

            if(!$query = "SELECT * FROM customer WHERE customer_ic ='$sessions'")
            {
              die('Error' . mysqli_error());
            }
              $result = mysqli_query($con, $query);

              while ($row = mysqli_fetch_array($result))
              {

               $sessions = $_SESSION['customer_ic'];

              $result = mysqli_query($con,"SELECT * from appointment NATURAL JOIN makeupartist WHERE customer_ic='$sessions' ORDER BY app_date DESC") or die(mysqli_error());
							$i = 0;

							echo "<div class='panel panel-primary'>";
              echo 		"<div class='panel-body'>";
              echo 			"<table class='table table-hover'id='example'>";
              echo 				"<thead>";
              echo 					"<tr>";
              echo 						"<th>No</th>";
							echo 						"<th>Appointment Status</th>";
              echo 						"<th>MUA Name</th>";
              echo 						"<th>MUA Phone Number </th>";
              echo 						"<th>MUA Address</th>";
              echo 						"<th>Appointment Date</th>";
              echo 						"<th>Total Charge (RM)</th>";
              echo 					"</tr>";
              echo 				"</thead>";
              echo 				"<tbody>";

              // Associative array
              if(mysqli_num_rows($result)>0)
              {
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                {
                  $app_id = $row["app_id"];
									$app_status = $row["app_status"];
  								$mua_ic = $row["mua_ic"];
  								$mua_name = $row["mua_name"];
  								$mua_phone_no = $row["mua_phone_no"];
  								$mua_address = $row["mua_address"];
  								$app_date = $row["app_date"];
  								$total_charge = $row["total_charge"];

  								$i++;


                  echo 					"<tr>";
                  echo 						"<td>".$i."</td>";
									echo 						"<td>".$app_status."</td>";
                  echo						"<td>".$mua_name."</td>";
                  echo						"<td>".$mua_phone_no."</td>";
                  echo						"<td>".$mua_address."</td>";
                  echo						"<td>".$app_date."</td>";
                  echo						"<td>".$total_charge."</td>";
                	echo 					"</tr>";



                }
              }
              else
              {
                echo "<tr>";
                echo	"<td colspan='4'>No Result</td>";
                echo "</tr>";
              }
                  echo				"</tbody>";
                  echo 			"</table>";
                  echo		"</div>";

                  echo "</div>";
}
            ?>






          								<div class="clearfix">
          						</div>

          						<div class="content-bottom">
          							<div class="col-md-12 post-top">

													<?php

													include 'config.php';

							            $sessions = $_SESSION['customer_ic'];

													$month = array('%2018-01%' , '%2018-02%' ,'%2018-03%' ,'%2018-04%' ,'%2018-05%' ,'%2018-06%' ,'%2018-07%' ,'%2018-08%' ,'%2018-09%' ,'%2018-10%' ,'%2018-11%' ,'%2018-12%' ,);
													$data = array();

													for ( $i =0;$i<12;$i++){
														$result = mysqli_query($con,"SELECT count(*) as ccount FROM `appointment` where app_date like '$month[$i]' AND app_status='CONFIRMED' AND customer_ic='$sessions'");
														$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
														$data[$i] = $row["ccount"];

													}

													$month = array('%2018-01%' , '%2018-02%' ,'%2018-03%' ,'%2018-04%' ,'%2018-05%' ,'%2018-06%' ,'%2018-07%' ,'%2018-08%' ,'%2018-09%' ,'%2018-10%' ,'%2018-11%' ,'%2018-12%' ,);
													$data2 = array();

													for ( $i =0;$i<12;$i++){
														$result = mysqli_query($con,"SELECT count(*) as ccount FROM `appointment` where app_date like '$month[$i]' AND app_status='REJECTED' AND customer_ic='$sessions'");
														$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
														$data2[$i] = $row["ccount"];

													}

													$month = array('%2018-01%' , '%2018-02%' ,'%2018-03%' ,'%2018-04%' ,'%2018-05%' ,'%2018-06%' ,'%2018-07%' ,'%2018-08%' ,'%2018-09%' ,'%2018-10%' ,'%2018-11%' ,'%2018-12%' ,);
													$data3 = array();

													for ( $i =0;$i<12;$i++){
														$result = mysqli_query($con,"SELECT count(*) as ccount FROM `appointment` where app_date like '$month[$i]' AND app_status='PENDING' AND customer_ic='$sessions'");
														$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
														$data3[$i] = $row["ccount"];

													}


													?>
													</div>
													<h3>Total Number of Appointment Status Against Months</h3>
													<br>
													<div id="graph"></div>
          							</div>
          						</div>
          						<div class="clearfix"> </div>
          					</div>

          				</div>
          			</div>
          			<div class="clearfix"> </div>


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
								// Use Morris.Bar
								Morris.Bar({
									element: 'graph',
									data: [
										{x: 'Jan', y: <?php echo $data[0];?>, z: <?php echo $data2[0];?>, a: <?php echo $data3[0];?>},
										{x: 'Feb', y: <?php echo $data[1];?>, z: <?php echo $data2[1];?>, a: <?php echo $data3[1];?>},
										{x: 'Mar', y: <?php echo $data[2];?>, z: <?php echo $data2[2];?>, a: <?php echo $data3[2];?>},
										{x: 'Apr', y: <?php echo $data[3];?>, z: <?php echo $data2[3];?>, a: <?php echo $data3[3];?>},
										{x: 'May', y:<?php echo $data[4];?>, z: <?php echo $data2[4];?>, a: <?php echo $data3[4];?>},
										{x: 'June', y: <?php echo $data[5];?>, z: <?php echo $data2[5];?>, a: <?php echo $data3[5];?>},
										{x: 'July', y: <?php echo $data[6];?>, z: <?php echo $data2[6];?>, a: <?php echo $data3[6];?>},
										{x: 'Aug', y: <?php echo $data[7];?>, z: <?php echo $data2[7];?>, a: <?php echo $data3[7];?>},
										{x: 'Sep', y: <?php echo $data[8];?>, z: <?php echo $data2[8];?>, a: <?php echo $data3[8];?>},
										{x: 'Oct', y: <?php echo $data[9];?>, z: <?php echo $data2[9];?>, a: <?php echo $data3[9];?>},
										{x: 'Nov', y: <?php echo $data[10];?>, z: <?php echo $data2[10];?>, a: <?php echo $data3[10];?>},
										{x: 'Dec', y: <?php echo $data[11];?>, z: <?php echo $data2[11];?>, a: <?php echo $data3[11];?>},
									],
									xkey: 'x',
									ykeys: ['y', 'z', 'a'],
									labels: ['CONFIRMED', 'REJECTED', 'PENDING']
								}).on('click', function(i, row){
									console.log(i, row);
								});
								</script>
          	</body>
          </html>
