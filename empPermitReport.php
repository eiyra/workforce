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
							<span>Permit Report</span>
						</h2>
					</div>
					
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
							<option value="3MONTHS">Permit Expires Within 3 Months</option>
							</select>
							&nbsp;&nbsp;
							<button type="submit" name="searchStatus" id="searchStatus" class="btn btn-primary btn-sm">Submit</button>
							
							</div>
							</form>

							<br><br>
							
							<?php
							include 'config.php';

							if (isset($_POST['searchStatus'])) {
								if ($_POST['status']) {
									$status = $_POST['status'];
								}

								$query = "";

								if ($status == '3MONTHS') {
									$query = "SELECT * FROM permit NATURAL JOIN fw WHERE permitExpDate BETWEEN date_sub(now(), interval 0 day) AND date_add(now(), interval 3 month) ORDER BY fw_name ASC";
								}

								$result = mysqli_query($con, $query) or die(mysqli_error());
								$i = 0;

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
								echo "<th>Permit Number</th>";
								echo "<th>Permit Expiry Date</th>";
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
								$permitNo = $row["permitNo"];
								$permitExpDate = $row["permitExpDate"];
								$permitNote = $row["permitNote"];

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
								echo "<td>" . $permitNo . "</td>";
								echo "<td>" . $permitExpDate . "</td>";
								echo "<td>" . $permitNote . "</td>";
								echo "</tr>";
								}
								}
								

								echo "</tbody>";
								echo "</table>";
								echo "</div>";
								echo "</div>";
							}
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