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
            <span>Manage Application</span>
          </h2>
        </div>

<br>
        <div class="card-content">
<?php
include 'config.php';

$sessions = $_SESSION['mua_ic'];

$result = mysqli_query($con,"SELECT * from appointment NATURAL JOIN customer WHERE app_status='PENDING' AND mua_ic='$sessions' ORDER BY app_date DESC") or die(mysqli_error());
$i = 0;

echo "<div class='panel panel-primary'>";
echo 		"<div class='panel-body'>";
echo 			"<table class='table table-hover'>";
echo				"<thead>";
echo					"<tr>";
echo						"<th>No</th>";
echo						"<th> Customer Name</th>";
echo						"<th> Customer Address</th>";
echo 						"<th> Customer Phone Number</th>";
echo						"<th>Appointment Date</th>";
echo						"<th>Appointment Session</th>";
echo						"<th>Total Charge (RM)</th>";
echo					"</tr>";
echo				"</thead>";
echo 				"<tbody>";

// Associative array
if(mysqli_num_rows($result)>0)
{
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
$app_id= $row["app_id"];
$customer_name= $row["customer_name"];
$customer_address= $row["customer_address"];
$customer_phone_no= $row["customer_phone_no"];
$app_date= $row["app_date"];
$app_session= $row["app_session"];
$total_charge= $row["total_charge"];

$i++;

  echo "<tr>";
  echo 	"<td>".$i."</td>";
  echo		"<td>".$customer_name."</td>";
  echo		"<td>".$customer_address."</td>";
  echo 		"<td>".$customer_phone_no."</td>";
  echo		"<td>".$app_date."</td>";
	echo		"<td>".$app_session."</td>";
  echo		"<td>".$total_charge."</td>";

  echo		"<td><a href='muaAcceptAppointment.php?app_id=".$app_id."' onclick='acceptAppointment()'><button class='btn btn-sm btn-success'>Accept</button></a></td>";
  echo		"<td><a href='muaRejectAppointment.php?app_id=".$app_id."' onclick='rejectAppointment()' ><button class='btn btn-sm btn-danger'>Reject</button></a></td>";
  echo "</tr>";

  echo "<script>
      function acceptAppointment() {
      var ask	= window.confirm('Are you sure you want to accept this appointment?');
      }
    </script>";

  echo "<script>
      function rejectAppointment() {

      var ask	= window.confirm('Are you sure you want to reject this appointment?');

      }
    </script>";


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

?>
        </div>



        <div class="clearfix"></div>
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
</body>
</html>
