<?php require_once("config.php"); ?>
<?php
	session_start();
	if($_SESSION['admin_ic'] == "")
	{
    echo "<script>alert('Please Login!');";
    echo "window.location.href = 'index.php';</script>";
		exit();
	}


	$strSQL = "SELECT * FROM admin WHERE admin_ic = '".$_SESSION['admin_ic']."' ";
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
					<h1><a class="navbar-brand title" href="adminDashboard.php">Makeup Artist Finder</a></h1>
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
											<a href="adminViewMua.php" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>Makeup Artist</a>
										</li>
										<li>
											<a href="adminViewCustomer.php" class=" hvr-bounce-to-right"><i class="fa fa-align-left nav_icon"></i>Customer</a>
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
							<span>List of Customer</span>
						</h2>
					</div>
					<div class="grid-system">
						<div class="horz-grid">
							<div class="grid-hor">
								<?php
									if ( (isset($_GET['exist_error'])) )
									{
										$admin_ic = $_GET['exist_error'];

										echo "<div class='alert alert-danger'>";
										echo	"<strong>Warning!</strong> Makeup Artist IC is already exist.";
										echo "</div>";
									}
								?>
								<?php
									if ( (isset($_GET['success'])) )
									{
										$admin_ic = $_GET['success'];

										echo "<div class='alert alert-success'>";
										echo	"<strong>Succesfully!</strong> inserted.";
										echo "</div>";
									}
								?>
								<?php
									if ( (isset($_GET['error_insert'])) )
									{
										$admin_ic = $_GET['error_insert'];

										echo "<div class='alert alert-danger'>";
										echo	"<strong>Warning!</strong> Error inserting data!";
										echo "</div>";
									}
								?>
								<?php
									if ( (isset($_GET['error_delete'])) )
									{
										$error_delete = $_GET['error_delete'];

										echo "<div class='alert alert-danger'>";
										echo	"<strong>Warning!</strong> Data was not successfully deleted.";
										echo "</div>";
									}
								?>
								<?php
									if ( (isset($_GET['success_delete'])) )
									{
										$success_delete = $_GET['success_delete'];

										echo "<div class='alert alert-success'>";
										echo	"<strong>Succesfully!</strong> deleted.";
										echo "</div>";
									}
								?>
								<?php
									if ( (isset($_GET['successExcel'])) )
									{
										$successExcel = $_GET['successExcel'];

										echo "<div class='alert alert-success'>";
										echo	"<strong>Succesfully!</strong> registered.";
										echo "</div>";
									}
								?>
								<!-- <a href="adminInsertCust.php"><button type="button" class="btn btn-primary">+</button></a> -->

								<div class='panel panel-primary'>
									<div class='panel-body'>
										<div class="table-responsive">
											<table class="table table-bordered table-hover" id="example">
												<thead>
													<tr>
														<th> No  </th>
														<th> Name </th>
														<th> Email </th>
														<th> Address </th>
														<th> Phone Number </th>
														<th> Gender </th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<?php
														//connect
														include 'config.php';

														// Check connection
														if (mysqli_connect_errno())
														{
															echo "Failed to connect to MySQL: " . mysqli_connect_error();
														}

														$sql="SELECT * FROM customer ORDER BY customer_name ASC";

														$result=mysqli_query($con,$sql);

														$i=0;
														// Associative array
														if(mysqli_num_rows($result)>0)
														{
															while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
															{
																$i++;
																echo "<tr>";
																echo	"<td>". $i ."</td>";
																echo 	"<td>".$row["customer_name"]."</td>";
																echo 	"<td>". $row["customer_email"] ."</td>";
																echo 	"<td>". $row["customer_address"] ."</td>";
																echo 	"<td>". $row["customer_phone_no"] ."</td>";
																echo 	"<td>". $row["customer_gender"] ."</td>";
																echo 	"<td>
                                                                <a href='deleteCust.php?customer_ic=" . $row["customer_ic"] . "' ><button type='button' onclick='return checkDelete()' class='btn btn-danger pull-right'>Delete</button></a>
                                                                		</td>";
																echo "</tr>";
															}
														}
														else{
															echo "<tr>";
															echo	"<td colspan='5'>No Result</td>";
															echo "</tr>";
														}
														mysqli_close($con);
														?>
												</tbody>
											</table>
										</div>
									</div>

								</div>
								<a href="adminDashboard.php" onclick="history.go(-1);" type="button" class="btn btn-primary">Back</a>
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
	</body>
</html>
