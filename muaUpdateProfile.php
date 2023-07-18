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
            <a href="muaProfile.php">Profile</a>
            <i class="fa fa-angle-right"></i>
            <span>Update Profile</span>
      </h2>
        </div>
        <div class="grid-form">

    <div class="grid-form1">
      <h3 id="forms-horizontal">Update Profile</h3>
      <form class="form-horizontal" method="POST" action="muaUploadFile.php" enctype="multipart/form-data">
<div class="col-md-6">
        <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label hor-form">Name:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="inputEmail3" name="fullname" value="<?php echo $objResult['mua_name']; ?>">
        </div>
        </div>

        <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label hor-form">Email:</label>
        <div class="col-sm-8">
          <input type="email" class="form-control" id="inputEmail3" name="email" value="<?php echo $objResult['mua_email']; ?>">
        </div>
        </div>

        <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label hor-form">Phone Number:</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" id="inputEmail3" name="phoneno" value="<?php echo $objResult['mua_phone_no']; ?>">
        </div>
        </div>

				<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label hor-form">Service Charge (RM):</label>
				<div class="col-sm-8">
					<input type="number" class="form-control" id="inputEmail3" name="charge" value="<?php echo $objResult['mua_charge']; ?>">
				</div>
				</div>

				<div class="form-group">
				<label for="inputName" class="col-sm-2 control-label hor-form">Address:</label>
				<div class="col-sm-10">
				<input type="text"  class="location form-control" id="location" name="location" value="<?php echo $objResult['mua_address']; ?>">
				</div>

				<div class="geo-details">
				<!-- <label>Latitude</label> -->
				<input data-geo="lat" name="lat" type="hidden" class="location">

				<!-- <label>Longitude</label> -->
				<input data-geo="lng" name="lng" type="hidden"  class="location">
				</div>

				</div>

        <div class="form-group">
        <label for="images" class="col-sm-4 control-label hor-form">Images:</label>
        <div class="col-sm-8">
          <input type="file" class="form-control" name="image" id="images" placeholder="">
          <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        </div>
        </div>

        <div class="form-group">

        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-primary">Update</button>
                    &nbsp;
                    <a href="muaProfile.php" onclick="history.go(-1);" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-warning">&nbsp;Back&nbsp;</a>
        </div>
        </div>
      </form>
      </div>
         <div class="clearfix"></div>
</div>


    <link rel="stylesheet" type="text/css" href="css/calendar.css" />
    <link rel="stylesheet" type="text/css" href="css/custom_1.css" />
    <script type="text/javascript" src="js/jquery.calendario.js"></script>
    <script type="text/javascript" src="js/data.js"></script>

		<script src="js/jquery.min.js"></script>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFtK2DXhzv80yx_MiAqW0I3V_HekYbDBs&libraries=places"></script>

		<script src="js/jquery.geocomplete.min.js"></script>

		<script>
		$(function(){

			$("#location").geocomplete({
				details: ".geo-details",
				detailsAttribute: "data-geo"
			});

		});
		</script>


    <!--scrolling js-->
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <!--//scrolling js-->
</body>
</html>
