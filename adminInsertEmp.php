<?php require_once("config.php"); ?>
<?php
	session_start();
	if($_SESSION['admin_ic'] == "")
	{
    echo "<script>alert('Please Login!');";
    echo "window.location.href = 'index.php';</script>";
		exit();
	}


	$strSQL = "SELECT * FROM admin WHERE admin_ic = '".$_SESSION['admin_ic']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);

?>

<?php                  
include "adminHeader.php";                 
?>

			<div id="page-wrapper" class="gray-bg dashbard-1">
				<div class="content-main">

					<!--banner-->
					<div class="banner">
						<h2>
							<a href="adminDashboard.php">Home</a>
							<i class="fa fa-angle-right"></i>
							<span>Insert New Employee</span>
						</h2>
					</div>
					<div class="grid-form">
						<div class="grid-form1">

							<form method="post" name="form1" action="addEmp.php">
								<div class="form-group">
									<label for="exampleInputEmail1">Employee IC</label>
									<input name="emp_ic" id="emp_ic" class="form-control" type="text" placeholder="Example : 960203015655" pattern=".{12}" required="required" title="Must be the same as in IC card and without dash (-)"/>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Employee Name</label>
									<input type="text" class="form-control" name="emp_name" id="emp_name" required>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Employee Phone No</label>
									<input type="number" class="form-control" name="emp_phoneNo" id="emp_phoneNo" pattern='^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$' required>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Employee Email</label>
									<input type="email" class="form-control" name="emp_email" id="emp_email" required>
								</div>
								<div class="form-group">

									<label for="exampleInputEmail1">Employee Address</label>
									<input type="text" class="location form-control" name="emp_address" id="emp_address" required>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Employee Gender</label>
									<div class="radio">
										<label><input type="radio" name="emp_gender" id="emp_gender" value="male">Male</label>
										<label><input type="radio" name="emp_gender" id="emp_gender" value="female">Female</label>
									</div>
								</div>
								
								<div class="form-group">
									<label for="exampleInputEmail1">Employee Department</label>
									<input type="number" class="form-control" name="emp_dept" id="emp_dept" required>
								</div>

								<br>

								<center><button type="submit" class="btn btn-primary">Submit</button>
								<button onclick="history.go(-1);" class="btn btn-warning">Cancel</button></center>

							</form>
						</div>
					</div>

					 <div class="clearfix"></div>
	</div>
	</div>


		
			<!--scrolling js-->
			<script src="js/jquery.nicescroll.js"></script>
			<script src="js/scripts.js"></script>
			<!--//scrolling js-->

<?php
include "adminFooter.php";                
?>
