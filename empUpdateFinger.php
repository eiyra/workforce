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
							<span>Update Fingerprint Details</span>
						</h2>
					</div>

         					<div class="grid-form">
										<form method="post" name="formAddFinger" action="updateFinger.php" enctype="multipart/form-data">
										
										<?php
										$strSQL1 = "SELECT * from fingerprint NATURAL JOIN fw WHERE fingerNo = '".$_GET['fingerNo']."' ";
										$objQuery1 = mysqli_query($con,$strSQL1);
										$objResult1 = mysqli_fetch_array($objQuery1);
										?>
										
										<input type="hidden" class="form-control" id="fw_id" name="fw_id" value="<?php echo $objResult1['fw_id']; ?>">
										
										<input type="hidden" class="form-control" id="fingerNo" name="fingerNo" value="<?php echo $objResult1['fingerNo']; ?>">
					
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
										<label for="lblDate">Fingerprint Date:</label>
										<input type="date" data-date-inline-picker="true" value="<?php echo $objResult1['fingerDate']; ?>" class="form-control" id="fingerDate" name="fingerDate">
										</div>
										
										<div class="form-group">
										<label for="inputName">Fingerprint Batch:</label>
										<input name="fingerBatch" id="fingerBatch" class="form-control" type="number" value="<?php echo $objResult1['fingerBatch']; ?>">
										</div>
									
										<div class="form-group">
										<label for="lblNation">Fingerprint Status:</label>
										<select class="form-control" name="fingerStatus" id="fingerStatus">
										<option value="">-- Choose Status --</option>
										<option value="PASS" <?php echo ($objResult1['fingerStatus'] === 'PASS') ? 'selected' : ''; ?>>PASS</option>
										<option value="FAIL" <?php echo ($objResult1['fingerStatus'] === 'FAIL') ? 'selected' : ''; ?>>FAIL</option>
										<option value="PENDING" <?php echo ($objResult1['fingerStatus'] === 'PENDING') ? 'selected' : ''; ?>>PENDING</option>
										</select>
										</div>		
										
										<div class="form-group">
										<label for="inputName">Note:</label>
										<input name="fingerNote" id="fingerNote" class="form-control" type="text" value="<?php echo $objResult1['fingerNote']; ?>">
										</div>
										
										<input name="fingerEmpAssign" id="fingerEmpAssign" class="form-control" type="hidden" value="<?php echo $objResult['emp_name']; ?>">
									
									
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
			document.getElementById("fingerDate").setAttribute('max', today);
			</script>

<?php
include "empFooter.php";                
?>