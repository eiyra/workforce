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

<script type="text/javascript">


		function calculateTotal(){

			var chrg = document.getElementById("charge").value;


      //Get selected data
      var elt = document.getElementById("makeupLook");
      var look = elt.options[elt.selectedIndex].value;

      var elt = document.getElementById("person");
      var prson = elt.options[elt.selectedIndex].value;

      //convert data to integers
      look = parseInt(look);
    	chrg = parseInt(chrg);
			prson = parseInt(prson);

      //calculate total value
			var plus = look+chrg;
      var total = prson*plus;
			// var total = prson*plus;
			if (total > 800)
			{
    	total = total*0.9 ;
			}
			else
			{
    	total = total;
			}

      //print value
      document.getElementById("total_charge").value=total;

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

<style>
		#myDIV {
		    width: 100%;
		    padding: 50px 0;
		    text-align: center;
		    background-color: lightgray;
		    margin-top: 20px;
		}
</style>


<style>

* {
    box-sizing: border-box;
}

.desc {
    padding: 15px;
    text-align: center;
}

.column {
    float: left;
    width: 33.33%;
    padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
    content: "";
    clear: both;
    display: table;
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
							<span>Make Appointment</span>
						</h2>
					</div>

					<div class="grid-form">
										<form method="post" name="formAppointment" action="makeAppointment.php">
										 <!-- <div class="grid-form1"> -->
															<?php
																			 $strSQL1 = "SELECT * FROM makeupartist WHERE mua_ic = '".$_GET['mua_ic']."' ";
																			 $objQuery1 = mysqli_query($con,$strSQL1);
																			 $objResult1 = mysqli_fetch_array($objQuery1);
																		?>

																			<input type="hidden" class="form-control" id="inputName" name="mua_ic" value="<?php echo $objResult1['mua_ic']; ?>" readonly>

														<div class="col-md-10">
														<div class="form-group">
													<label for="inputName">MUA Name:</label>
											<input type="text" class="form-control" id="inputName" name="name" value="<?php echo $objResult1['mua_name']; ?>" readonly>
											</div>

											<div class="form-group">
										<label for="inputName" >MUA Email:</label>
								<input type="text" class="form-control" id="inputName" name="email" value="<?php echo $objResult1['mua_email']; ?>" readonly>
								</div>

					<div class="form-group">
				<label for="inputName">MUA Phone Number:</label>
		<input type="text" class="form-control" id="inputName" name="phoneno" value="<?php echo $objResult1['mua_phone_no']; ?>"readonly>
		</div>

<div class="form-group">
<label for="inputName">MUA Service Charge (RM):</label>
<input type="text" class="form-control" id="charge" name="charge" value="<?php echo $objResult1['mua_charge']; ?>" readonly>
</div>

<div class="form-group">
<label for="inputName">MUA Address:</label>
<input type="text" class="form-control" id="inputName" name="address" value="<?php echo $objResult1['mua_address']; ?>"readonly>
</div>

<!-- <div class="form-group">
<label for="text">Booking Session :</label>
<div class="radio">
<label><input type="radio" name="session" id="session" value="morning">Morning (8am - 12pm)</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label><input type="radio" name="session" id="session" value="afternoon">Afternoon (1pm - 5pm)</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label><input type="radio" name="session" id="session" value="evening">Evening (6pm - 10pm)</label>
</div> -->

<div class="form-group">
<label for="lblMakeupLook">Booking Session:</label>
<select class="form-control" name="session" id="session" required="required">
<option value="">-- Choose Session --</option>
<option value="morning">Morning (8am - 12pm)</option>
<option value="afternoon">Afternoon (1pm - 5pm)</option>
<option value="evening">Evening (6pm - 10pm)</option>
</select>
</div>

<div class="form-group">
<label for="lblBookingDate">Booking Date:</label>
<input type="date" data-date-inline-picker="true" value="dd/mm/yyyy" class="form-control" id="bookingDate" name="bookingDate" placeholder="dd/mm/yyyy"  min="2018-08-08" required>
</div>

<div class="form-group">
<label for="lblMakeupLook">Makeup Look:</label>
<select class="form-control" name="makeupLook" id="makeupLook" onChange="calculateTotal()" required="required">
<option value="">-- Choose Makeup Look --</option>
<option value="150">Natural (RM150)</option>
<option value="200">Evening (RM200)</option>
<option value="250">Celebrity (RM250)</option>
<option value="300">Airbrush (RM300)</option>
<option value="350">Bridal (RM350)</option>
</select>
</div>

<button onclick="myFunction()">Makeup Look Details</button>
<br>
<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";

    }
}
</script>

<div id="myDIV" style="display:none">

	<div class="row">
  <div class="column">
	<a target="_blank" href="img/looks/natural.jpg">
    <img src="img/looks/natural.jpg" alt="natural" style="width:80%">
	</a>
	 <div class="desc">Natural Look</div>
  </div>

	<div class="column">
	<a target="_blank" href="img/looks/evening.jpg">
    <img src="img/looks/evening.jpg" alt="evening" style="width:80%">
	</a>
	 <div class="desc">Evening Look</div>
  </div>

	<div class="column">
	<a target="_blank" href="img/looks/cel4.jpg">
    <img src="img/looks/cel4.jpg" alt="celeb" style="width:80%">
	</a>
	 <div class="desc">Celebrity Look</div>
  </div>

	<div class="column">
	<a target="_blank" href="img/looks/bridal.jpg">
	<img src="img/looks/bridal.jpg" alt="bridal" style="width:80%">
	</a>
	 <div class="desc">Bridal Look</div>
	</div>

	<div class="column">
	<a target="_blank" href="img/looks/air2.jpg">
		<img src="img/looks/air2.jpg" alt="air" style="width:165%">
	</a>
	 <div class="desc" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;Airbrush Look</div>
	</div>

</div>

</div>

<br>

<div class="form-group">
<label for="lblSession">Number of Person:</label>

<select class="form-control" name="person" id="person" onChange="calculateTotal()" required="required">
<option value="">-- Number of Person --</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
</div>

<div class="form-group">
<label for="inputName">Total Charge (RM):</label>
<input type="text" class="form-control" id="total_charge" name="total_charge" readonly>
</div>
<label for="disco"><i>**A discount of 10% wil be given for total amount more than RM 800**<i></label>

</div>

							<div class="form-group" align="left">
														<div class="col-sm-12">
														<br />
								<button type="submit" class="btn btn-success">Submit</button>
								<button id="myButton" class="btn btn-warning">Cancel</button>
								<script type="text/javascript">
										document.getElementById("myButton").onclick = function () {
												location.href = "customerDashboard.php";
										};
								</script>

														</div>
													</div>
														<br /><br /><br /><br /><br /><br /><br />
										 <!-- </div> -->
										 </form>
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
