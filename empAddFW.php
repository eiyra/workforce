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
							<span>Add Foreign Worker</span>
						</h2>
					</div>

         					<div class="grid-form">
										<form method="post" name="formAddFW" action="addFW.php">
										
										<?php
										// $strSQL1 = "SELECT * FROM makeupartist WHERE mua_ic = '".$_GET['mua_ic']."' ";
										// $objQuery1 = mysqli_query($con,$strSQL1);
										// $objResult1 = mysqli_fetch_array($objQuery1);
										?>
					
										<div class="form-group">
										<label for="inputName">Name :</label>
										<input name="fw_name" id="fw_name" class="form-control" type="text" required="required">
										</div>
										
										<!-- <div class="form-group">
										<label for="inputName">Nationality :</label>
										<input name="fw_nation" id="fw_nation" class="form-control" type="text" required="required">
										</div>  -->
										
										<div class="form-group">
										<label for="lblNation">Nationality:</label>
										<select class="form-control" name="fw_nation" id="fw_nation" required="required">
										<option value="">-- Select Nationality --</option>
										<option value="Bangladesh">Bangladesh</option>
										<option value="India">India</option>
										<option value="Indonesia">Indonesia</option>
										<option value="Myanmar">Myanmar</option>
										<option value="Pakistan">Pakistan</option>
										</select>
										</div>
										
										<div class="form-group">
										<label for="exampleInputEmail1">Phone No :</label>
										<input type="number" class="form-control" name="fw_phone" id="fw_phone" required>
										</div>
										
										<div class="form-group">
										<!-- <label for="exampleInputEmail1">Phone No :</label> -->
										<input type="number" class="form-control" name="fw_phone2" id="fw_phone2">
										</div>
										
										<div class="form-group">
										<!-- <label for="exampleInputEmail1">Phone No :</label> -->
										<input type="number" class="form-control" name="fw_phone3" id="fw_phone3">
										</div>
										
										<div class="form-group">
										<label for="exampleInputEmail1">Address :</label>
										<input type="text" class="form-control" name="fw_address" id="fw_address" required>
										</div>
										
										
										<div class="form-group">
										<label for="exampleInputEmail1">Gender :</label>
										<div class="radio">
										<label><input type="radio" name="fw_gender" id="fw_gender" value="MALE" required>Male</label> &nbsp;&nbsp;
										<label><input type="radio" name="fw_gender" id="fw_gender" value="FEMALE">Female</label>
										</div>
										</div>
										
										<br>
										
										<div class="form-group">
										<label for="exampleInputEmail1">Intake Type :</label>
										<div class="radio">
										<label><input type="radio" name="fw_intake" id="fw_intake" value="RTK" required>RTK</label> &nbsp;&nbsp;
										<label><input type="radio" name="fw_intake" id="fw_intake" value="CALLING VISA">Calling Visa</label>
										</div>
										</div>
										
										<br>
										
										<div class="form-group">
										<label for="exampleInputEmail1">Agency Registered :</label>
										<div class="radio">
										<label><input type="radio" name="fw_register" id="fw_register" value="TQM" required>TQM</label> &nbsp;
										<label><input type="radio" name="fw_register" id="fw_register" value="BUMINUR">Buminur</label> &nbsp;&nbsp;
										<label><input type="radio" name="fw_register" id="fw_register" value="GOLDENSPEC">Goldenspec</label>
										</div>
										</div>
										
										<div class="form-group">
										<label for="exampleInputEmail1">Remarks :</label>
										<input type="text" class="form-control" name="fw_remarks" id="fw_remarks" required>
										</div>
										
										<div class="form-group">
										<label for="inputName">Employee Assigned :</label>
										<input name="emp_name" id="emp_name" class="form-control" type="text" value="<?php echo $objResult['emp_name']; ?>" readonly>
										</div>

										<div class="form-group" align="left">
										<div class="col-sm-12">
										<br>
										<button type="submit" class="btn btn-success">Submit</button>
										<button id="myButton" class="btn btn-warning">Cancel</button>
											<script type="text/javascript">
											document.getElementById("myButton").onclick = function () {
												location.href = "empFWList.php";
											};
											</script>

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