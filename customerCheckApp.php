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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

		<script>
		$(document).ready( function ()
		{
		$('#example').DataTable();
		} )
		</script>

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

		<script language="JavaScript" type="text/javascript">
		function checkDelete(){
		return confirm('Confirm deleting?');

		}
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
							<span>Check Appointment</span>
						</h2>
					</div>

<br><br>

											<div class="card-content">
				<form class="form-inline" method="POST">
					<div class="form-group">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Select Status</label>
						<select class="form-control" name="status" required>
							<option value=""></option>
							<option value="PENDING">Pending</option>
							<option value="CONFIRMED">Confirmed</option>
							<option value="REJECTED">Rejected</option>
						</select>
						<button type="submit" name="searchStatus" id="searchStatus" class="btn btn-primary btn-sm">Search</button>
					</div>
				</form>


				<br>
				<br>
				<?php
					include 'config.php';

					if ((isset($_POST['searchStatus'])))
					{
						if($_POST['status'])
						{
							$status=$_POST['status'];
						}
						$sessions = $_SESSION['customer_ic'];

						$query = mysqli_query($con,"SELECT * from appointment NATURAL JOIN makeupartist WHERE customer_ic = '$sessions' AND app_status='$status' ORDER BY app_id DESC") or die(mysqli_error());
						$i = 0;

								echo "<div class='panel panel-primary'>";
								echo 		"<div class='panel-body'>";
								echo 			"<table class='table table-hover'id='example'>";
								echo 				"<thead>";
								echo 					"<tr>";
								echo 						"<th>No</th>";
								echo 						"<th>MUA Name</th>";
								echo 						"<th>MUA Phone Number </th>";
								echo 						"<th>MUA Address</th>";
								echo 						"<th>Appointment Status</th>";
								echo 						"<th>Appointment Date</th>";
								echo 						"<th>Appointment Session</th>";
								echo 						"<th>Total Charge (RM)</th>";
								echo 					"</tr>";
								echo 				"</thead>";
								echo 				"<tbody>";



						if(mysqli_num_rows($query) > 0)
						{
							while($row = mysqli_fetch_assoc($query))
							{

								$app_id = $row["app_id"];
								$mua_ic = $row["mua_ic"];
								$mua_name = $row["mua_name"];
								$mua_phone_no = $row["mua_phone_no"];
								$mua_address = $row["mua_address"];
								$app_status = $row["app_status"];
								$app_date = $row["app_date"];
								$app_session = $row["app_session"];
								$total_charge = $row["total_charge"];

								$i++;

									if($status == 'PENDING')

									{

											echo 					"<tr>";
											echo 						"<td>".$i."</td>";
											echo						"<td>".$mua_name."</td>";
											echo						"<td>".$mua_phone_no."</td>";
											echo						"<td>".$mua_address."</td>";
											echo						"<td>".$app_status."</td>";
											echo						"<td>".$app_date."</td>";
											echo						"<td>".$app_session."</td>";
											echo						"<td>".$total_charge."</td>";

											echo						"<td><a href='customerBookingForm.php?mua_ic=".$mua_ic."'<button class='btn btn-md btn-success'>Edit</button></a></td>";
											echo						"<td><a href='customerDeleteBooking.php?app_id=".$app_id."'<button class='btn btn-md btn-danger' onclick='return checkDelete()'>Delete</button></a></td>";

											echo 					"</tr>";
										}



									else if($status == 'CONFIRMED')
									{

										echo 					"<tr>";
										echo 						"<td>".$i."</td>";
										echo						"<td>".$mua_name."</td>";
										echo						"<td>".$mua_phone_no." kg</td>";
										echo						"<td>".$mua_address."</td>";
										echo						"<td>".$app_status."</td>";
										echo						"<td>".$app_date."</td>";
										echo						"<td>".$app_session."</td>";
										echo						"<td>".$total_charge."</td>";
										echo 					"</tr>";

										}


									else if($status == 'REJECTED')
									{

										echo 					"<tr>";
										echo 						"<td>".$i."</td>";
										echo						"<td>".$mua_name."</td>";
										echo						"<td>".$mua_phone_no." kg</td>";
										echo						"<td>".$mua_address."</td>";
										echo						"<td>".$app_status."</td>";
										echo						"<td>".$app_date."</td>";
										echo						"<td>".$app_session."</td>";
										echo						"<td>".$total_charge."</td>";
										echo 					"</tr>";
									}
							}
						}

						else
						{
								echo "<tr>";
								echo 	"<td colspan='3'>No Result </td>";
								echo "</tr>";
						}

								echo				"</tbody>";
								echo 			"</table>";
								echo		"</div>";

								echo "</div>";
					}


				?>


											</div>
									</div>
							</div>
					</div>


					<div class="clearfix"> </div>
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
</body>
</html>
