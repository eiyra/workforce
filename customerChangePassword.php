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
      <span>Update Password</span>


      </h2>
        </div>
        <div class="grid-form">

    <div class="grid-form">

    <div class="grid-form1">
      <h3 id="forms-horizontal">Change Password</h3>
      <form class="form-horizontal" method="POST" action="">
      <div class="col-md-6">
                        <input class="form-control" type="hidden" name="customer_ic" id="customer_ic" value="<?php echo($_SESSION['customer_ic']);?>" readonly>
<?php
                  ini_set('display_errors', 1);
                  error_reporting(~0);

                  if(isset($_POST["curpassword"],$_POST["newpassword"],$_POST["confirmnewpassword"], $_POST["customer_ic"] ))
                  {
                    include 'config.php';

                    $sessions = $_SESSION['customer_ic'];

                    $customer_ic= $_POST["customer_ic"];
                    $curpassword= $_POST["curpassword"];
                    $newpassword= $_POST["newpassword"];
                    $confirmnewpassword= $_POST["confirmnewpassword"];

                    $query1 = mysqli_query($con,"SELECT * FROM customer WHERE customer_ic = '". $_SESSION['customer_ic'] ."'");
                    $result1 = mysqli_fetch_array($query1,MYSQLI_ASSOC);

                    $user_password = $result1['customer_password'];
                    $u_pass = ($user_password);


                    if ($curpassword==$u_pass)
                    {

                    if ($newpassword==$confirmnewpassword)
                    {


                      $query2 = mysqli_query($con,"UPDATE customer SET customer_password ='". ($newpassword) ."' WHERE customer_ic= '".$_SESSION['customer_ic']."'");

                      echo "<div class='alert alert-success' role='alert'>";
                      echo	" <strong>Success!</strong> You have succesfully change your password!";
                      echo "</div>";
                    }
                    if ($newpassword!=$confirmnewpassword)
                    {
                      echo "<div class='alert alert-danger' role='alert'>";
                      echo	"<strong>Warning!</strong> Password did not match!";
                      echo "</div>";
                    }
                    }

                    else
                    {
                      echo "<div class='alert alert-danger' role='alert'>";
                      echo	"<strong>Warning!</strong> Old Password is wrong";
                      echo "</div>";
                    }
                  }

                  ?>

            <div class="form-group">
            <label for="inputEmail3" class="col-md-4 control-label hor-form">Old Password:</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" name="curpassword" id="curpassword" value="" placeholder="Current Password">
            </div>
            </div>
            <div class="form-group">
            <label for="inputEmail3" class="col-md-4 control-label hor-form">New Password:</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="newpassword" name="newpassword" value="" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase letter and at least 8 characters!" >
            </div>
            </div>
            <div class="form-group">
            <label for="inputEmail3" class="col-md-4 control-label hor-form">Confirm Password:</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="newpassword" name="confirmnewpassword" value="" placeholder="Confirm New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase letter and at least 8 characters!" >
            </div>
            </div>
                </div>
        <div class="form-group">

        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Update</button>
                    &nbsp;
                    <a href="customerProfile.php" onclick="history.go(-1);" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-warning">&nbsp;Back&nbsp;</a>
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
