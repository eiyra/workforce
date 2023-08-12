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
															
										<div class="form-group">
										<label for="inputName">Name :</label>
										<input name="fw_name" id="fw_name" class="form-control" type="text" required>
										</div>
										
										<div class="form-group">
										<label for="exampleInputEmail1">Foreign Worker Year :</label>
										<input type="number" class="form-control" name="fw_year" id="fw_year" required>
										</div>
										
										<div class="form-group">
										  <label for="lblNation">Nationality :</label>
										  <select class="form-control" name="fw_nation" id="fw_nation" required>
											<option value="">-- Select Nationality --</option>
											<option value="Bangladesh">Bangladesh</option>
											<option value="Cambodia">Cambodia</option>
											<option value="China">China</option>
											<option value="India">India</option>
											<option value="Indonesia">Indonesia</option>
											<option value="Laos">Laos</option>
											<option value="Myanmar">Myanmar</option>
											<option value="Nepal">Nepal</option>
											<option value="Pakistan">Pakistan</option>
											<option value="Philippines">Philippines</option>
											<option value="Sri Lanka">Sri Lanka</option>
											<option value="Thailand">Thailand</option>
											<option value="Timor-Leste">Timor-Leste (East Timor)</option>
											<option value="Vietnam">Vietnam</option>
										  </select>
										</div>
				
										<div class="form-group">
										<label for="exampleInputEmail1">Phone No (1) :</label>
										<input type="number" class="form-control" name="fw_phone" id="fw_phone" required>
										</div>
										
										<div class="form-group">
										<label for="exampleInputEmail1">Phone No (2) :</label>
										<input type="number" class="form-control" name="fw_phone2" id="fw_phone2">
										</div>
										
										<div class="form-group">
										<label for="exampleInputEmail1">Phone No (3) :</label>
										<input type="number" class="form-control" name="fw_phone3" id="fw_phone3">
										</div>
										
										<div class="form-group">
										<label for="exampleInputEmail1">Address :</label>
										<input type="text" class="form-control" name="fw_address" id="fw_address">
										</div>
										
										<div class="form-group">
										<label for="lblGender">Gender:</label>
										<select class="form-control" name="fw_gender" id="fw_gender" required>
										<option value="">-- Select Gender --</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										</select>
										</div>
										
										<div class="form-group">
										<label for="lblIntake">Intake Type:</label>
										<select class="form-control" name="fw_intake" id="fw_intake" onchange="showText()" required>
										<option value="">-- Select Intake --</option>
										<option value="RTK 1">RTK 1.0</option>
										<option value="RTK 2">RTK 2.0</option>
										<option value="CALLING VISA">CALLING VISA</option>
										</select>
										</div>

										<div class="form-group" id="cvDateInputDiv" style="display: none;" required>
										<label for="lblDate">Calling Visa Date:</label>
										<input type="date" data-date-inline-picker="true" class="form-control" id="cvDateInput" name="cvDateInput">
										</div>

										<div class="form-group" id="cvBatchInputDiv" style="display: none;" required>
										<label for="lblDate">Calling Visa Batch:</label>
										<input type="number" class="form-control" id="cvBatchInput" name="cvBatchInput">
										</div>

										<script>
										function showText() {
										  const selectedValue = document.getElementById("fw_intake").value;
										  const cvDateInputDiv = document.getElementById("cvDateInputDiv");
										  const cvBatchInputDiv = document.getElementById("cvBatchInputDiv");

										  // Display or hide the elements based on the selected value
										  if (selectedValue === "CALLING VISA") {
											cvDateInputDiv.style.display = "block";
											cvBatchInputDiv.style.display = "block";
										  } else {
											cvDateInputDiv.style.display = "none";
											cvBatchInputDiv.style.display = "none";
										  }
										}
										</script>


										<div class="form-group">
										<label for="lblAgency">Agency Registered:</label>
										<select class="form-control" name="fw_register" id="fw_register" onchange="showTextInput()" required>
										<option value="">-- Select Agency --</option>
										<option value="TQM">TQM</option>
										<option value="BUMINUR">BUMINUR</option>
										<option value="GOLDENSPEC">GOLDENSPEC</option>
										<option value="OTHERS">OTHERS (Please Specify)</option>
										</select>
										</div>
										
										<div class="form-group" id="otherInput" style="display: none;" required>
										<label for="otherInput">Employer Name:</label>
										<input type="text" class="form-control" name="majikanName" id="majikanName">
										</div>

										<script>
										function showTextInput() {
										  const selectedValue = document.getElementById("fw_register").value;
										  const otherInputDiv = document.getElementById("otherInput");

										  if (selectedValue === "OTHERS") {
											otherInputDiv.style.display = "block";
										  } else {
											otherInputDiv.style.display = "none";
										  }
										}
										</script>  
										
										<br> 
										
										<div class="form-group">
										<label for="exampleInputEmail1">Remarks :</label>
										<input type="text" class="form-control" name="fw_remarks" id="fw_remarks">
										</div>
										
										<div class="form-group">
										<label for="inputName">Employee Assigned :</label>
										<input name="emp_name" id="emp_name" class="form-control" type="text" value="<?php echo $objResult['emp_name']; ?>" readonly>
										</div>

										<div class="form-group" align="right">
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
			
			<script>
			var today = new Date().toISOString().split('T')[0];
			document.getElementById("cvDateInput").setAttribute('max', today);
			</script>

<?php
include "empFooter.php";                
?>