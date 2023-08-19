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

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
		
		<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
		<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
		

		<script>
		$(document).ready( function ()
		{
		$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
		'print'
		]
		
		} );
		} )
		</script>
		

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
			
			
			/* Style the tab */
			.tab {
			  overflow: hidden;
			  border: 1px solid #ccc;
			  background-color: #f1f1f1;
			}

			/* Style the buttons that are used to open the tab content */
			.tab button {
			  background-color: inherit;
			  float: left;
			  border: none;
			  outline: none;
			  cursor: pointer;
			  padding: 14px 16px;
			  transition: 0.3s;
			}

			/* Change background color of buttons on hover */
			.tab button:hover {
			  background-color: #ddd;
			}

			/* Create an active/current tablink class */
			.tab button.active {
			  background-color: #ccc;
			}

			/* Style the tab content */
			.tabcontent {
			  display: none;
			  padding: 6px 12px;
			  border: 1px solid #ccc;
			  border-top: none;
			}
			
			/* Add this CSS in your stylesheet */
			.center {
			text-align: center;
			}

			.btn-responsive {
				display: inline-block;
				margin: 5px;
				/* Additional styles as needed */
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
					<h1><a class="navbar-brand title" href="empDashboard.php">Workforce Management System</a></h1>
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
								<a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret"><?php echo $objResult['emp_name']; ?><i class="caret"></i></span>
                      <?php if($objResult['emp_image'] == null) { ?>
                      <img width="40" height="40" src="img/default.png">
                    <?php } else { ?><img width="40" height="40" src="img/<?php echo $objResult['emp_image']; ?>"> <?php } ?></a>
								<ul class="dropdown-menu " role="menu">
									<li><a href="empProfile.php"><i class="fa fa-user"></i>Edit Profile</a></li>
									<li><a href="empChangePassword.php"><i class="fa fa-key"></i>Change Password</a></li>
									<li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
								</ul>
							</li>
						</ul>
					</div>  <!-- /.navbar-collapse -->

					<div class="clearfix">

					</div>

          <div class="navbar-default sidebar" role="navigation">
						<div class="sidebar-nav navbar-collapse">
							<ul class="nav" id="side-menu">
								<li>
									<a href="empDashboard.php" class=" hvr-bounce-to-right">
										<i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboard</span></a>
								</li>
								<li>
									<a href="empFWList.php" class=" hvr-bounce-to-right">
										<i class="fa fa-list nav_icon"></i> <span class="nav-label">Foreign Worker</span></a>
								</li>
								<li>
									<a href="empReport.php" class=" hvr-bounce-to-right">
										<i class="fa fa-clipboard nav_icon"></i> <span class="nav-label">Report</span></a>
								</li> 
								

							</ul>
						</div>
					</div>
				</div>
			</nav>
		</div>