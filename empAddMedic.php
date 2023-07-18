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
							<span>Add Medical Details</span>
						</h2>
					</div>

         					<div class="grid-form">
										<form method="post" name="formAddPass" action="addMedic.php" enctype="multipart/form-data">
										
										<?php
										$strSQL1 = "SELECT * FROM fw WHERE fw_id = '".$_GET['fw_id']."' ";
										$objQuery1 = mysqli_query($con,$strSQL1);
										$objResult1 = mysqli_fetch_array($objQuery1);
										?>
										
										<input type="hidden" class="form-control" id="fw_id" name="fw_id" value="<?php echo $objResult1['fw_id']; ?>">
					
										<div class="form-group">
										<label for="inputName">Name :</label>
										<input name="fw_name" id="fw_name" class="form-control" type="text" value="<?php echo $objResult1['fw_name']; ?>" readonly>
										</div>
										
										<div class="form-group">
										<label for="inputName">Nationality :</label>
										<input name="fw_nation" id="fw_nation" class="form-control" type="text" value="<?php echo $objResult1['fw_nation']; ?>" readonly>
										</div>
										
										
										<input name="medicalNo" id="medicalNo" class="form-control" type="hidden">
										
										<div class="form-group">
										<label for="lblDate">Medical Date:</label>
										<input type="date" data-date-inline-picker="true" value="dd/mm/yyyy" class="form-control" id="medicalDate" name="medicalDate" placeholder="dd/mm/yyyy" value="<?= date('Y-m-d', time()); ?>" required>
										</div>
										
										<div class="form-group">
										<label for="lblDate">Immigration Sent Date:</label>
										<input type="date" data-date-inline-picker="true" value="dd/mm/yyyy" class="form-control" id="immDate" name="immDate" placeholder="dd/mm/yyyy" value="<?= date('Y-m-d', time()); ?>" required>
										</div>
										
										<!-- <div class="form-group">
										<label for="exampleInputEmail1">Medical Status:</label>
										<div class="radio">
										<label><input type="radio" name="medicalStatus" id="medicalStatus" value="PASS" required>PASS</label> &nbsp;&nbsp;
										<label><input type="radio" name="medicalStatus" id="medicalStatus" value="FAIL">FAIL</label> &nbsp;&nbsp;
										<label><input type="radio" name="medicalStatus" id="medicalStatus" value="MEDICAL TEMBAK">MEDICAL TEMBAK</label>
										</div>
										</div> -->
										
										<div class="form-group">
										<label for="lblNation">Medical Status:</label>
										<select class="form-control" name="medicalStatus" id="medicalStatus" required>
										<option value="">-- Choose Status --</option>
										<option value="PASS">PASS</option>
										<option value="FAIL">FAIL</option>
										<option value="PENDING">PENDING</option>
										<option value="MEDICAL TEMBAK">MEDICAL TEMBAK</option>
										</select>
										</div>
								
										<div class="form-group">
										<label for="inputName">Note :</label>
										<input name="medicNote" id="medicNote" class="form-control" type="text">
										</div>
										
										<input name="medicEmpAssign" id="medicEmpAssign" class="form-control" type="hidden" value="<?php echo $objResult['emp_name']; ?>" readonly>
										
			
										<div class="form-group" align="right">
										<div class="col-sm-12">
										<br>
										<button name="submit" type="submit" class="btn btn-success">Submit</button>
										<button id="myButton" onclick="history.go(-1);" class="btn btn-warning">Cancel</button>
										
											<!-- <script type="text/javascript">
											document.getElementById("myButton").onclick = function () {
												location.href = "empDashboard.php";
											};
												 </script> -->

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

<?php
include "empFooter.php";                
?>