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
							<a href="empFWList.php">Home</a>
							<i class="fa fa-angle-right"></i>
							<span>Add Permit Details</span>
						</h2>
					</div>

         					<div class="grid-form">
										<form method="post" name="formAddPass" action="addPassport.php" enctype="multipart/form-data">
										
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
										<label for="inputName">Permit Number :</label>
										<input name="permitNo" id="permitNo" class="form-control" type="text" required>
										</div>
										
										<div class="form-group">
										<label for="lblDate">Permit Issued Date:</label>
										<input type="date" data-date-inline-picker="true" value="dd/mm/yyyy" class="form-control" id="permitIssuedDate" name="permitIssuedDate" placeholder="dd/mm/yyyy" value="<?= date('Y-m-d', time()); ?>" required>
										</div>
										
										<div class="form-group">
										<label for="lblDate">Permit Expiry Date:</label>
										<input type="date" data-date-inline-picker="true" value="dd/mm/yyyy" class="form-control" id="permitExpDate" name="permitExpDate" placeholder="dd/mm/yyyy" value="<?= date('Y-m-d', time()); ?>" required>								
										</div>
										
										<div class="form-group">
										<label for="lblDate">Permit Taken Date:</label>
										<input type="date" data-date-inline-picker="true" value="dd/mm/yyyy" class="form-control" id="permitTakenDate" name="permitTakenDate" placeholder="dd/mm/yyyy" value="<?= date('Y-m-d', time()); ?>" required>
										</div>
										
										<div class="form-group">
										<label for="passFile">Permit File:</label>
										<input type="file" class="form-control" name="permitFile" id="permitFile" accept=".pdf" placeholder="">
										<input type="hidden" name="MAX_FILE_SIZE" value="100000">
										</div>
										
										<div class="form-group">
										<label for="exampleInputEmail1">Permit Status :</label>
										<div class="radio">
										<label><input type="radio" name="permitStatus" id="permitStatus" value="PASS">PASS</label> &nbsp;&nbsp;
										<label><input type="radio" name="permitStatus" id="permitStatus" value="FAIL">FAIL</label>
										</div>
										</div>
										
										<div class="form-group">
										<label for="inputName">Permit Year :</label>
										<input name="permitYear" id="permitYear" class="form-control" type="number">
										</div>
										
										<div class="form-group">
										<label for="inputName">Note :</label>
										<input name="permitNote" id="permitNote" class="form-control" type="text">
										</div>
										
										<div class="form-group">
										<label for="inputName">Employee Assigned :</label>
										<input name="permitEmpAssign" id="permitEmpAssign" class="form-control" type="text" value="<?php echo $objResult['emp_name']; ?>" readonly>
										</div>
									
										<div class="form-group" align="left">
										<div class="col-sm-12">
										<br>
										<button type="submit" class="btn btn-success">Submit</button>
										<button id="myButton" onclick="history.go(-1);" class="btn btn-warning">Cancel</button>
										
											<!-- <script type="text/javascript">
											document.getElementById("myButton").onclick = function () {
												location.href = "empDashboard.php";
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
			
			
		

<?php
include "empFooter.php";                
?>