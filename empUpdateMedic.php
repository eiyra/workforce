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
							<span>Update Medical Details</span>
						</h2>
					</div>

         					<div class="grid-form">
										<form method="post" name="formAddPass" action="updateMedic.php" enctype="multipart/form-data">
										
										<?php
										$strSQL1 = "SELECT * from medical NATURAL JOIN fw WHERE medicalNo = '".$_GET['medicalNo']."' ";
										$objQuery1 = mysqli_query($con,$strSQL1);
										$objResult1 = mysqli_fetch_array($objQuery1);
										?>
										
										<input type="hidden" class="form-control" id="fw_id" name="fw_id" value="<?php echo $objResult1['fw_id']; ?>">
										
										<input type="hidden" class="form-control" id="medicalNo" name="medicalNo" value="<?php echo $objResult1['medicalNo']; ?>">
					
										<div class="form-group">
										<label for="inputName">Name :</label>
										<input name="fw_name" id="fw_name" class="form-control" type="text" value="<?php echo $objResult1['fw_name']; ?>" readonly>
										</div>
										
										<div class="form-group">
										<label for="inputName">Nationality :</label>
										<input name="fw_nation" id="fw_nation" class="form-control" type="text" value="<?php echo $objResult1['fw_nation']; ?>" readonly>
										</div>
										
										<div class="form-group">
										<label for="inputName">Foreign Worker Year:</label>
										<input name="fw_year" id="fw_year" class="form-control" type="text" value="<?php echo $objResult1['fw_year']; ?>" readonly>
										</div>
										
										<div class="form-group">
										<label for="inputName">Intake Type:</label>
										<input name="fw_intake" id="fw_intake" class="form-control" type="text" value="<?php echo $objResult1['fw_intake']; ?>" readonly>
										</div>
						
										<div class="form-group">
										<label for="lblDate">Medical Date:</label>
										<input type="date" data-date-inline-picker="true" value="<?php echo $objResult1['medicalDate']; ?>" class="form-control" id="medicalDate" name="medicalDate" required>
										</div>
										
										<div class="form-group">
										<label for="lblDate">Immigration Sent Date:</label>
										<input type="date" data-date-inline-picker="true" value="<?php echo $objResult1['immDate']; ?>" class="form-control" id="immDate" name="immDate" required>
										</div>
										
										<div class="form-group">
										  <label for="lblNation">Medical Status:</label>
										  <select class="form-control" name="medicalStatus" id="medicalStatus">
											<option value="PASS" <?php echo ($objResult1['medicalStatus'] === 'PASS') ? 'selected' : ''; ?>>PASS</option>
											<option value="FAIL" <?php echo ($objResult1['medicalStatus'] === 'FAIL') ? 'selected' : ''; ?>>FAIL</option>
											<option value="PENDING" <?php echo ($objResult1['medicalStatus'] === 'PENDING') ? 'selected' : ''; ?>>PENDING</option>
											<option value="MEDICAL TEMBAK" <?php echo ($objResult1['medicalStatus'] === 'MEDICAL TEMBAK') ? 'selected' : ''; ?>>MEDICAL TEMBAK</option>
										  </select>
										</div>

										
										
										<div class="form-group">
										<label for="inputName">Note:</label>
										<input name="medicNote" id="medicNote" class="form-control" type="text" value="<?php echo $objResult1['medicNote']; ?>">
										</div>
			
		
										<input name="medicEmpAssign" id="medicEmpAssign" class="form-control" type="hidden" value="<?php echo $objResult1['emp_assigned']; ?>">
										
										
									
										<div class="form-group" align="right">
										<div class="col-sm-12">
										<br>
										<button name="submit" type="submit" class="btn btn-success">Update</button>
										<!-- <button id="myButton" onclick="" class="btn btn-warning">Cancel</button>
										
										<script type="text/javascript">
											document.getElementById("myButton").onclick = function () {
												location.href = "empFWList.php";
											};
										</script>  -->

										</div>
										</div>
							
										<br /><br /><br /><br /><br /><br /><br />
										 
										 </form>
							</div>
						
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
			var today = new Date().toISOString().split('T')[0];
			document.getElementById("medicalDate").setAttribute('max', today);
			document.getElementById("immDate").setAttribute('max', today);
			</script>

<?php
include "empFooter.php";                
?>