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
							<a href="empFWList.php">Foreign Worker List</a>
							<i class="fa fa-angle-right"></i>
							<span>Add Employer Details</span>
						</h2>
					</div>

         					<div class="grid-form">
										<form method="post" name="formAddMajikan" action="addMajikan.php" enctype="multipart/form-data">
										
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
										
										<div class="form-group">
										<label for="inputName">Foreign Worker Year:</label>
										<input name="fw_year" id="fw_year" class="form-control" type="text" value="<?php echo $objResult1['fw_year']; ?>" readonly>
										</div> 
										
										<div class="form-group">
										<label for="inputName">Intake Type:</label>
										<input name="fw_intake" id="fw_intake" class="form-control" type="text" value="<?php echo $objResult1['fw_intake']; ?>" readonly>
										</div>
										
										<!-- <input name="majikanNo" id="majikanNo" class="form-control" type="hidden"> -->
										
										<div class="form-group">
										<label for="inputName">Employer Name:</label>
										<input name="majikanName" id="majikanName" class="form-control" type="text" required>
										</div>
										
										<div class="form-group">
										<label for="exampleInputEmail1">Employer Phone Number (1):</label>
										<input type="number" class="form-control" name="majikanPhone" id="majikanPhone" required>
										</div>
										
										<div class="form-group">
										<label for="exampleInputEmail1">Employer Phone Number (2):</label>
										<input type="number" class="form-control" name="majikanPhone2" id="majikanPhone2">
										</div>
										
										<div class="form-group" align="left">
										<label for="text">Employer Email (1):</label>
										<input name="majikanEmail" type="majikanEmail" class="form-control">
										</div>
										
										<div class="form-group" align="left">
										<label for="text">Employer Email (2):</label>
										<input name="majikanEmail2" type="majikanEmail2" class="form-control">
										</div>
																	
										<div class="form-group">
										<label for="inputName">Note :</label>
										<input name="majikanNote" id="majikanNote" class="form-control" type="text">
										</div>
										
										<input name="majikanEmpAssign" id="majikanEmpAssign" class="form-control" type="hidden" value="<?php echo $objResult['emp_name']; ?>" readonly>
										
			
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