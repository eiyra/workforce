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
							<a href="empReport.php">Report</a>
							<i class="fa fa-angle-right"></i>
							<a href="empPassReport.php">Passport Report</a>
						</h2>
					</div>
					
					<br>

					
							<div class='panel panel-primary'>
							<div class='panel-body'>
							<div class="table-responsive">
							
							
							<form class="form-inline" method="GET">
							<div class="form-group">
							<i class="fa fa-search nav_icon "></i>
							<select class="form-control" name="status" required>
							<option value=""></option>
							<option value="18MONTHS">Passport Expires Within 18 Months</option>
							<option value="6MONTHS">Passport Expires Within 6 Months</option>
							</select>
							&nbsp;&nbsp;
							<button type="submit" name="searchStatus" id="searchStatus" class="btn btn-primary btn-sm">Submit</button>
							
							</div>
							</form>

							<br><br>
							
							<?php
							include 'config.php';

							// Fetch all data from the table initially
							$query = "SELECT * FROM passport NATURAL JOIN fw ORDER BY fw_name ASC";
							$result = mysqli_query($con, $query) or die(mysqli_error());
							$i = 0;

							// Check if the filter value is present in the URL
							if (isset($_GET['status'])) {
								$status = $_GET['status'];

								// Generate the appropriate query based on the selected filter value
								if ($status == '18MONTHS') {
									$query = "SELECT * FROM passport NATURAL JOIN fw WHERE passExpDate BETWEEN date_sub(now(), interval 0 day) AND date_add(now(), interval 18 month) ORDER BY fw_name ASC";
								} else if ($status == '6MONTHS') {
									$query = "SELECT * FROM passport NATURAL JOIN fw WHERE passExpDate BETWEEN date_sub(now(), interval 0 day) AND date_add(now(), interval 6 month) ORDER BY fw_name ASC";
								}

								$result = mysqli_query($con, $query) or die(mysqli_error());
							}

								echo "<div class='panel panel-primary'>";
								echo "<div class='panel-body'>";
								echo "<table class='table table-hover' id='example'>";
								echo "<thead>";
								echo "<tr>";
								echo "<th>No</th>";
								echo "<th>Name</th>";
								echo "<th>Nationality</th>";
								echo "<th>Year</th>";
								echo "<th>Phone Number (1)</th>";
								echo "<th>Phone Number (2)</th>";
								echo "<th>Phone Number (3)</th>";
								echo "<th>Intake Type</th>";
								echo "<th>Calling Visa Date</th>";
								echo "<th>Calling Visa Batch</th>";
								echo "<th>Agency Registered</th>";
								echo "<th>Passport Number</th>";
								echo "<th>Passport Expiry Date</th>";
								echo "<th>Remarks</th>";
								echo "</tr>";
								echo "</thead>";
								echo "<tbody>";

								if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_assoc($result)) 
								{

								$fw_name = $row["fw_name"];
								$fw_nation = $row["fw_nation"];
								$fw_year = $row["fw_year"];
								$fw_phone = $row["fw_phone"];
								$fw_phone2 = $row["fw_phone2"];
								$fw_phone3 = $row["fw_phone3"];
								$fw_intake = $row["fw_intake"];
								$cvDateInput = $row["cvDateInput"];
								$cvBatchInput = $row["cvBatchInput"];
								$fw_register = $row["fw_register"];
								$passNo = $row["passNo"];
								$passExpDate = $row["passExpDate"];
								$passNote = $row["passNote"];

								$i++;

								echo "<tr>";
								echo "<td>" . $i . "</td>";
								echo "<td>" . $fw_name . "</td>";
								echo "<td>" . $fw_nation . "</td>";
								echo "<td>" . $fw_year . "</td>";
								echo "<td>" . $fw_phone . "</td>";
								echo "<td>" . $fw_phone2 . "</td>";
								echo "<td>" . $fw_phone3 . "</td>";
								echo "<td>" . $fw_intake . "</td>";
								echo "<td>" . $cvDateInput . "</td>";
								echo "<td>" . $cvBatchInput . "</td>";
								echo "<td>" . $fw_register . "</td>";
								echo "<td>" . $passNo . "</td>";
								echo "<td>" . $passExpDate . "</td>";
								echo "<td>" . $passNote . "</td>";
								echo "</tr>";
								}
								}
								
								// else 
								// {
								// echo "<tr>";
								// echo "<td colspan='12'>No Result </td>";
								// echo "</tr>";
								// }

								echo "</tbody>";
								echo "</table>";
								echo "</div>";
								echo "</div>";
							
							?>

			
											
							</div>
							</div>
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
				

<?php
include "empFooter.php";                
?>