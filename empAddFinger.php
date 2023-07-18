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
							<span>Add Fingerprint Details</span>
						</h2>
					</div>

         					<div class="grid-form">
										<form method="post" name="formAddPass" action="addFinger.php" enctype="multipart/form-data">
										
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
										
										
										<input name="fingerNo" id="fingerNo" class="form-control" type="hidden">
										
										<div class="form-group">
										<label for="lblDate">Fingerprint Date:</label>
										<input type="date" data-date-inline-picker="true" value="dd/mm/yyyy" class="form-control" id="fingerDate" name="fingerDate" placeholder="dd/mm/yyyy" value="<?= date('Y-m-d', time()); ?>" required>
										</div>
										
										<div class="form-group">
										<label for="inputName">Fingerprint Batch:</label>
										<input name="fingerBatch" id="fingerBatch" class="form-control" type="number" required>
										</div>
										
										<div class="form-group">
										<label for="exampleInputEmail1">Fingerprint Status:</label>
										<div class="radio">
										<label><input type="radio" name="fingerStatus" id="fingerStatus" value="PASS" required>PASS</label> &nbsp;&nbsp;
										<label><input type="radio" name="fingerStatus" id="fingerStatus" value="FAIL">FAIL</label> &nbsp;&nbsp;
										</div>
										</div>
								
										<div class="form-group">
										<label for="inputName">Note :</label>
										<input name="fingerNote" id="fingerNote" class="form-control" type="text">
										</div>
										
										<input name="fingerEmpAssign" id="fingerEmpAssign" class="form-control" type="hidden" value="<?php echo $objResult['emp_name']; ?>" readonly>
										
			
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