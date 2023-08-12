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
							<span>Medical Report</span>
						</h2>
					</div>
					
					<br>

					
							<div class='panel panel-primary'>
							<div class='panel-body'>
							<div class="table-responsive">
							
							
							<form class="form-inline" method="POST">
							<div class="form-group">
							&nbsp;&nbsp;&nbsp;<label><h6>Medical Status</h6></label> &nbsp;&nbsp;
							<!--<i class="fa fa-search nav_icon "></i> -->
							<select class="form-control" name="status" required>
							<option value=""></option>
							<option value="PENDING">PENDING</option>
							<option value="PASS">PASS</option>
							<option value="FAIL">FAIL</option>
							<option value="MEDICAL TEMBAK">MEDICAL TEMBAK</option>
							</select>
							&nbsp;&nbsp;
							<button type="submit" name="searchStatus" id="searchStatus" class="btn btn-primary btn-sm">Submit</button>
							
							</div>
							</form>

							<br><br>
							
							<?php
							include 'config.php';

							if ((isset($_POST['searchStatus'])))
							{
								if($_POST['status'])
								{
									$status=$_POST['status'];
								}

								$query = mysqli_query($con,"SELECT * from medical NATURAL JOIN fw WHERE medicalStatus='$status' ORDER BY fw_name ASC") or die(mysqli_error());
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
								echo "<th>Agency Registered</th>";
								echo "<th>Medical Date</th>";
								echo "<th>Immigration Sent Date</th>";
								echo "<th>Medical Status</th>";
								echo "<th>Remarks</th>";
								echo "</tr>";
								echo "</thead>";
								echo "<tbody>";



						if(mysqli_num_rows($query) > 0)
						{
							while($row = mysqli_fetch_assoc($query))
							{

								$fw_name = $row["fw_name"];
								$fw_nation = $row["fw_nation"];
								$fw_year = $row["fw_year"];
								$fw_phone = $row["fw_phone"];
								$fw_phone2 = $row["fw_phone2"];
								$fw_phone3 = $row["fw_phone3"];
								$fw_intake = $row["fw_intake"];
								$fw_register = $row["fw_register"];
								$medicalDate = $row["medicalDate"];
								$immDate = $row["immDate"];
								$medicalStatus = $row["medicalStatus"];
								$medicNote = $row["medicNote"];

								$i++;

									if($status == 'PENDING')

									{

									echo "<tr>";
									echo "<td>" . $i . "</td>";
									echo "<td>" . $fw_name . "</td>";
									echo "<td>" . $fw_nation . "</td>";
									echo "<td>" . $fw_year . "</td>";
									echo "<td>" . $fw_phone . "</td>";
									echo "<td>" . $fw_phone2 . "</td>";
									echo "<td>" . $fw_phone3 . "</td>";
									echo "<td>" . $fw_intake . "</td>";
									echo "<td>" . $fw_register . "</td>";
									echo "<td>" . $medicalDate . "</td>";
									echo "<td>" . $immDate . "</td>";
									echo "<td>" . $medicalStatus . "</td>";
									echo "<td>" . $medicNote . "</td>";
									echo "</tr>";
									
									}



									else if($status == 'PASS')
									{

									echo "<tr>";
									echo "<td>" . $i . "</td>";
									echo "<td>" . $fw_name . "</td>";
									echo "<td>" . $fw_nation . "</td>";
									echo "<td>" . $fw_year . "</td>";
									echo "<td>" . $fw_phone . "</td>";
									echo "<td>" . $fw_phone2 . "</td>";
									echo "<td>" . $fw_phone3 . "</td>";
									echo "<td>" . $fw_intake . "</td>";
									echo "<td>" . $fw_register . "</td>";
									echo "<td>" . $medicalDate . "</td>";
									echo "<td>" . $immDate . "</td>";
									echo "<td>" . $medicalStatus . "</td>";
									echo "<td>" . $medicNote . "</td>";
									echo "</tr>";

									}


									else if($status == 'FAIL')
									{

									echo "<tr>";
									echo "<td>" . $i . "</td>";
									echo "<td>" . $fw_name . "</td>";
									echo "<td>" . $fw_nation . "</td>";
									echo "<td>" . $fw_year . "</td>";
									echo "<td>" . $fw_phone . "</td>";
									echo "<td>" . $fw_phone2 . "</td>";
									echo "<td>" . $fw_phone3 . "</td>";
									echo "<td>" . $fw_intake . "</td>";
									echo "<td>" . $fw_register . "</td>";
									echo "<td>" . $medicalDate . "</td>";
									echo "<td>" . $immDate . "</td>";
									echo "<td>" . $medicalStatus . "</td>";
									echo "<td>" . $medicNote . "</td>";
									echo "</tr>";
									
									}
									
									else if($status == 'MEDICAL TEMBAK')
									{

									echo "<tr>";
									echo "<td>" . $i . "</td>";
									echo "<td>" . $fw_name . "</td>";
									echo "<td>" . $fw_nation . "</td>";
									echo "<td>" . $fw_year . "</td>";
									echo "<td>" . $fw_phone . "</td>";
									echo "<td>" . $fw_phone2 . "</td>";
									echo "<td>" . $fw_phone3 . "</td>";
									echo "<td>" . $fw_intake . "</td>";
									echo "<td>" . $fw_register . "</td>";
									echo "<td>" . $medicalDate . "</td>";
									echo "<td>" . $immDate . "</td>";
									echo "<td>" . $medicalStatus . "</td>";
									echo "<td>" . $medicNote . "</td>";
									echo "</tr>";
									
									}
							}
						}

						// else
						// {
								// echo "<tr>";
								// echo 	"<td colspan='3'>No Result </td>";
								// echo "</tr>";
						// }

								echo	"</tbody>";
								echo 	"</table>";
								echo	"</div>";

								echo 	"</div>";
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