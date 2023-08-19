<?php 
require_once("config.php"); 
	session_start();
	
	if($_SESSION['admin_ic'] == "")
	{
    echo "<script>alert('Please Login!');";
    echo "window.location.href = 'index.php';</script>";
		exit();
	}


	$strSQL = "SELECT * FROM admin WHERE admin_ic = '".$_SESSION['admin_ic']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	// Check if the query was successful
if ($objQuery) {
    $objResult = mysqli_fetch_array($objQuery);
} else {
    // Handle query error
    echo "Query failed: " . mysqli_error($con);
    exit();
}


	$sql="SELECT COUNT(emp_gender)as a from employee where emp_gender='male'";
	$result=mysqli_query($con,$sql);
	// Check if the queries were successful before fetching data
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
}

	$sql1="SELECT COUNT(emp_gender)as b from employee where emp_gender='female'";
	$result1=mysqli_query($con,$sql1);
	// Check if the queries were successful before fetching data
if ($result1 && mysqli_num_rows($result1) > 0) {
    $row1 = mysqli_fetch_array($result1);
}

	$sql2="SELECT COUNT(mua_gender)as c from makeupartist where mua_gender='male'";
	$result2=mysqli_query($con,$sql2);
	// Check if the queries were successful before fetching data
if ($result2 && mysqli_num_rows($result2) > 0) {
    $row2 = mysqli_fetch_array($result2);
}

	$sql3="SELECT COUNT(mua_gender)as d from makeupartist where mua_gender='female'";
	$result3=mysqli_query($con,$sql3);
	// Check if the queries were successful before fetching data
if ($result3 && mysqli_num_rows($result3) > 0) {
    $row3 = mysqli_fetch_array($result3);
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Workforce Management System</title>
		<link rel="shortcut icon" href="img/logo/workforce.png" type="image/x-icon"/>
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


					  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
					  <script src="mors/morris.js"></script>
					  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
					  <script src="mors/lib/example.js"></script>

					  <link rel="stylesheet" href="mofx/morris.css">






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
					<h1><a class="navbar-brand title" href="adminDashboard.php">Workforce Management System</a></h1>
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
								<a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret"><?php echo $objResult['admin_name']; ?><i class="caret"></i></span>
                      <?php if($objResult['admin_image'] == null) { ?>
                      <img width="40" height="40" src="img/default.png">
                    <?php } else { ?><img width="40" height="40" src="img/<?php echo $objResult['admin_image']; ?>"> <?php } ?></a>
								<ul class="dropdown-menu " role="menu">
									<li><a href="adminProfile.php"><i class="fa fa-user"></i>Edit Profile</a></li>
										<li><a href="adminChangePassword.php"><i class="fa fa-key"></i>Change Password</a></li>
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
									<a href="adminDashboard.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboard</span> </a>
								</li>
								<li>
									<a href="#" class=" hvr-bounce-to-right">
										<i class="fa fa-list nav_icon"></i> <span class="nav-label">Manage User</span><span class="fa arrow"></span>
									</a>
									<ul class="nav nav-second-level">
										<li>
											<a href="adminViewEmp.php" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>Employee</a>
										</li>
										<li>
											<a href="adminViewFW.php" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>Foreign Worker</a>
										</li>
										<li>
											<a href="adminViewAdmin.php" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>Admin</a>
										</li>
									</ul>
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
							<a href="adminDashboard.php">Home</a>
							<i class="fa fa-angle-right"></i>
							<span>Dashboard</span>
						</h2>
					</div>

          <div class="content-top">
						<br>
						<h3>Total Number of Customer and Makeup Artist</h3>
						<br>
						<div id="graph"></div>

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
			<script>
			// Use Morris.Bar
			Morris.Bar({
				element: 'graph',
				data: [
					{x: 'Employee', y: <?php echo $row['a'];?>, z: <?php echo $row1['b'];?>},
					{x: 'makeupartist', y:  <?php echo $row2['c'];?>, z:  <?php echo $row3['d'];?>}
				],
				xkey: 'x',
				ykeys: ['y', 'z'],
				labels: ['Male', 'Female']
			}).on('click', function(i, row){
				console.log(i, row);
			});
			</script>
			<!--//scrolling js-->
	</body>
</html>
