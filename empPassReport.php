<?php require_once("config.php"); ?>
<?php
	session_start();
	if($_SESSION['emp_ic'] == "")
	{
    echo "<script>alert('Please Login!');";
    echo "window.location.href = 'index.php';</script>";
		exit();
	}


	$strSQL = "SELECT * FROM employee WHERE emp_ic = '".$_SESSION['emp_ic']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);

?>

<?php                  
include "empHeader.php";                 
?>

			<div id="page-wrapper" class="gray-bg dashbard-1">
				<div class="content-main">

					<!--banner-->
					<div class="banner">
						<h2>
							<a href="empDashboard.php">Home</a>
							<i class="fa fa-angle-right"></i>
							<span>Report Overview</span>
						</h2>
					</div>
					
					<br>

         			<!-- Tab links -->
					<div class="tab">
					<button class="tablinks" onclick="openCity(event, 'Passport')" id="defaultOpen">Passport</button>
					<button class="tablinks" onclick="openCity(event, 'Permit')">Permit</button>
					<button class="tablinks" onclick="openCity(event, 'Medical')">Medical</button>
					<button class="tablinks" onclick="openCity(event, 'Payment')">Payment</button>
					</div>
							
							<!-- Tab content -->
							<div id="Passport" class="tabcontent">
							<br>
							
					
							<div class='panel panel-primary'>
							<div class='panel-body'>
							<div class="table-responsive">
							
							
							<form class="form-inline" method="POST">
							<div class="form-group">
							<i class="fa fa-search nav_icon "></i>
							<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>SEARCH :</label>  -->
							<select class="form-control" name="status" required>
							<option value=""></option>
							<option value="3MONTHS">Passport Expires Within 18 Months</option>
							<option value="Nationality">Nationality</option>
							<option value="REJECTED">Rejected</option>
							</select>
							<button type="submit" name="searchStatus" id="searchStatus" class="btn btn-primary btn-sm">Submit</button>
							
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
							// $sessions = $_SESSION['fw_id'];

						$query = mysqli_query($con,"SELECT * from passport NATURAL JOIN fw WHERE passExpDate BETWEEN date_sub(now(), interval 0 day) 
						AND date_add(now(), interval 18 month) ORDER BY fw_name ASC") or die(mysqli_error());
						$i = 0;

								echo "<div class='panel panel-primary'>";
								echo 		"<div class='panel-body'>";
								echo 			"<table class='table table-hover'id='example'>";
								echo 				"<thead>";
								echo 					"<tr>";
								echo 						"<th>No</th>";
								echo 						"<th>Name</th>";
								echo 						"<th>Nationality</th>";
								echo 						"<th>Phone Number</th>";
								echo 						"<th>Intake Type</th>";
								echo 						"<th>Agency Registered</th>";
								echo 						"<th>Passport Number</th>";
								echo 						"<th>Passport Expiry Date</th>";
								echo 					"</tr>";
								echo 				"</thead>";
								echo 				"<tbody>";



						if(mysqli_num_rows($query) > 0)
						{
							while($row = mysqli_fetch_assoc($query))
							{

								$fw_name = $row["fw_name"];
								$fw_nation = $row["fw_nation"];
								$fw_phone = $row["fw_phone"];
								$fw_intake = $row["fw_intake"];
								$fw_register = $row["fw_register"];
								$passNo = $row["passNo"];
								$passExpDate = $row["passExpDate"];
								

								$i++;

									if($status == '3MONTHS')

									{

											echo 					"<tr>";
											echo 						"<td>".$i."</td>";
											echo						"<td>".$fw_name."</td>";
											echo						"<td>".$fw_nation."</td>";
											echo						"<td>".$fw_phone."</td>";
											echo						"<td>".$fw_intake."</td>";
											echo						"<td>".$fw_register."</td>";
											echo						"<td>".$passNo."</td>";
											echo						"<td>".$passExpDate."</td>";

											// echo						"<td><a href='customerBookingForm.php?mua_ic=".$mua_ic."'<button class='btn btn-md btn-success'>Edit</button></a></td>";
											// echo						"<td><a href='customerDeleteBooking.php?app_id=".$app_id."'<button class='btn btn-md btn-danger' onclick='return checkDelete()'>Delete</button></a></td>";

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
							

							<div id="Permit" class="tabcontent">
							
							<div class='panel panel-primary'>
							<div class='panel-body'>
							<div class="table-responsive">
							
							
							<form class="form-inline" method="POST">
							<div class="form-group">
							<i class="fa fa-search nav_icon "></i>
							<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>SEARCH :</label>  -->
							<select class="form-control" name="status" required>
							<option value=""></option>
							<option value="3MONTHS">Passport Expires Within 18 Months</option>
							<option value="Nationality">Nationality</option>
							<option value="REJECTED">Rejected</option>
							</select>
							<button type="submit" name="searchStatus" id="searchStatus" class="btn btn-primary btn-sm">Submit</button>
							
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
							// $sessions = $_SESSION['fw_id'];

						$query = mysqli_query($con,"SELECT * from passport NATURAL JOIN fw WHERE passExpDate BETWEEN date_sub(now(), interval 0 day) 
						AND date_add(now(), interval 18 month) ORDER BY fw_name ASC") or die(mysqli_error());
						$i = 0;

								echo "<div class='panel panel-primary'>";
								echo 		"<div class='panel-body'>";
								echo 			"<table class='table table-hover'id='example'>";
								echo 				"<thead>";
								echo 					"<tr>";
								echo 						"<th>No</th>";
								echo 						"<th>Name</th>";
								echo 						"<th>Nationality</th>";
								echo 						"<th>Phone Number</th>";
								echo 						"<th>Intake Type</th>";
								echo 						"<th>Agency Registered</th>";
								echo 						"<th>Passport Number</th>";
								echo 						"<th>Passport Expiry Date</th>";
								echo 					"</tr>";
								echo 				"</thead>";
								echo 				"<tbody>";



						if(mysqli_num_rows($query) > 0)
						{
							while($row = mysqli_fetch_assoc($query))
							{

								$fw_name = $row["fw_name"];
								$fw_nation = $row["fw_nation"];
								$fw_phone = $row["fw_phone"];
								$fw_intake = $row["fw_intake"];
								$fw_register = $row["fw_register"];
								$passNo = $row["passNo"];
								$passExpDate = $row["passExpDate"];
								

								$i++;

									if($status == '3MONTHS')

									{

											echo 					"<tr>";
											echo 						"<td>".$i."</td>";
											echo						"<td>".$fw_name."</td>";
											echo						"<td>".$fw_nation."</td>";
											echo						"<td>".$fw_phone."</td>";
											echo						"<td>".$fw_intake."</td>";
											echo						"<td>".$fw_register."</td>";
											echo						"<td>".$passNo."</td>";
											echo						"<td>".$passExpDate."</td>";

											// echo						"<td><a href='customerBookingForm.php?mua_ic=".$mua_ic."'<button class='btn btn-md btn-success'>Edit</button></a></td>";
											// echo						"<td><a href='customerDeleteBooking.php?app_id=".$app_id."'<button class='btn btn-md btn-danger' onclick='return checkDelete()'>Delete</button></a></td>";

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
							
							
							
							
							
							
							
							
							
							
							
							</div>

							<div id="Medical" class="tabcontent">
							<h3>Tokyo</h3>
							<p>Tokyo is the capital of Japan.</p>
							</div>
							
							<div id="Payment" class="tabcontent">
							<h3>Tokyo</h3>
							<p>Tokyo is the capital of Japan.</p>
							</div>
							
							<br><br><br>
							

	
						
				</div>

			</div>
			
			<div class="clearfix"> </div>

			<link rel="stylesheet" type="text/css" href="css/calendar.css" />
			<link rel="stylesheet" type="text/css" href="css/custom_1.css" />
			<script type="text/javascript" src="js/jquery.calendario.js"></script>
			<script type="text/javascript" src="js/data.js"></script>
		
			<!--scrolling js-->
			<script src="js/jquery.nicescroll.js"></script>
			<script src="js/scripts.js"></script>
			<!--//scrolling js-->
			
			
			<script>
			
			function openCity(evt, cityName) {
			  // Declare all variables
			  var i, tabcontent, tablinks;

			  // Get all elements with class="tabcontent" and hide them
			  tabcontent = document.getElementsByClassName("tabcontent");
			  for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			  }

			  // Get all elements with class="tablinks" and remove the class "active"
			  tablinks = document.getElementsByClassName("tablinks");
			  for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			  }

			  // Show the current tab, and add an "active" class to the button that opened the tab
			  document.getElementById(cityName).style.display = "block";
			  evt.currentTarget.className += " active";
			}
			
			document.getElementById("defaultOpen").click();
			
			</script>
			

<?php
include "empFooter.php";                
?>