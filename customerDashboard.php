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

		<script>

	 var marker;
		 function initialize() {
			 var infoWindow = new google.maps.InfoWindow;

			 var mapOptions = {
				 mapTypeId: google.maps.MapTypeId.ROADMAP
			 }

			 var map = new google.maps.Map(document.getElementById('mapp'), mapOptions);
			 var bounds = new google.maps.LatLngBounds();

			 // Retrieve data from database
				<?php
					 $query = mysqli_query($con,"select * from makeupartist");
					 while ($data = mysqli_fetch_array($query))
					 {
						 	 $name = $data['mua_name'];
							 $locName = $data['mua_address'];
							 $lat= $data['latitude'];
							 $long = $data['longitude'];


							 echo ("addMarker($lat, $long, '<b>$name<br>$locName</b>');\n");
					 }
				 ?>

			 // Proses of making marker
			 function addMarker(lat, lng, info) {
					 var lokasi = new google.maps.LatLng(lat, lng);
					 bounds.extend(lokasi);
					 var marker = new google.maps.Marker({
							 map: map,
							 position: lokasi
					 });
					 map.fitBounds(bounds);
					 bindInfoWindow(marker, map, infoWindow, info);
				}

			 // Displays information on markers that are clicked
			 function bindInfoWindow(marker, map, infoWindow, html) {
				 google.maps.event.addListener(marker, 'click', function() {
					 infoWindow.setContent(html);
					 infoWindow.open(map, marker);
				 });
			 }

			 }
		 google.maps.event.addDomListener(window, 'load', initialize);

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

	<body onload="initialize()">
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
            <span>Finder</span>
          </h2>
        </div>

        <div class="grid-system">
          <div class="horz-grid">
            <div class="grid-hor">


								<div id="mapp" style="width: 1059px; height: 400px;"></div>


<!--
								<div>
         <label for="raddressInput">Search location:</label>
         <input type="text" id="addressInput" size="15"/>
        <label for="radiusSelect">Radius:</label>
        <select id="radiusSelect" label="Radius">
          <option value="50" selected>50 kms</option>
          <option value="30">30 kms</option>
          <option value="20">20 kms</option>
          <option value="10">10 kms</option>
        </select>

        <input type="button" id="searchButton" value="Search"/>
    </div>
    <div><select id="locationSelect" style="width: 10%; visibility: hidden"></select></div> -->



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

		<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFtK2DXhzv80yx_MiAqW0I3V_HekYbDBs&callback=initMap">
		</script>


    <!--scrolling js-->
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <!--//scrolling js-->
</body>
</html>
