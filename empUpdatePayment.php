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
							<span>Add Payment Details</span>
						</h2>
					</div>

         					<div class="grid-form">
										<form method="post" name="formAddPermit" action="updatePayment.php" enctype="multipart/form-data">
										
										<?php
										$strSQL1 = "SELECT * FROM payment NATURAL JOIN fw WHERE payNo = '".$_GET['payNo']."' ";
										$objQuery1 = mysqli_query($con,$strSQL1);
										$objResult1 = mysqli_fetch_array($objQuery1);
										?>
										
										<input type="hidden" class="form-control" id="fw_id" name="fw_id" value="<?php echo $objResult1['fw_id']; ?>">
										
										<input type="hidden" class="form-control" id="payNo" name="payNo" value="<?php echo $objResult1['payNo']; ?>">
					
										<div class="form-group">
										<label for="inputName">Name:</label>
										<input name="fw_name" id="fw_name" class="form-control" type="text" value="<?php echo $objResult1['fw_name']; ?>" readonly>
										</div>
										
										<div class="form-group">
										<label for="inputName">Nationality:</label>
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
										<label for="inputName">Foreign Worker Type:</label>
										<select class="form-control" name="fwType" id="fwType" required>
										<option value=""  style="font-style: italic;">-- Select Foreign Worker Type --</option>
										<option value="Budak Lama" <?php echo ($objResult1['fwType'] === 'Budak Lama') ? 'selected' : ''; ?>>Budak Lama</option>
										<option value="Budak Baru" <?php echo ($objResult1['fwType'] === 'Budak Baru') ? 'selected' : ''; ?>>Budak Baru</option>
										</select>
										</div>
										
										<br>
										
										<div class="form-group">
										<label for="inputName">Serial No. 1:</label>
										<input name="serialOne" id="serialOne" class="form-control" type="text" value="<?php echo $objResult1['serialOne']; ?>" required>
										
										<label for="lblDate">First Payment Date:</label>
										<input type="date" data-date-inline-picker="true" class="form-control" id="firstPayDate" name="firstPayDate" value="<?php echo $objResult1['firstPayDate']; ?>" required>
										
										<label for="inputName">First Payment Amount (RM):</label>
										<input name="firstPay" id="firstPay" class="form-control" type="number" step=".01" value="<?php echo $objResult1['firstPay']; ?>" required>
																	
										<label for="lblNation">First Payment Method:</label>
										<select class="form-control" name="firstMethod" id="firstMethod" required>
										<option value=""  style="font-style: italic;">-- Select Payment Method --</option>
										<option value="Cash" <?php echo ($objResult1['firstMethod'] === 'Cash') ? 'selected' : ''; ?>>Cash</option>
										<option value="Online" <?php echo ($objResult1['firstMethod'] === 'Online') ? 'selected' : ''; ?>>Online</option>
										</select>
										</div>
										
										<br> 
										
										<div class="form-group">
										<label for="inputName">Serial No. 2:</label>
										<input name="serialTwo" id="serialTwo" class="form-control" type="text" value="<?php echo $objResult1['serialTwo']; ?>">
										
										<label for="lblDate">Second Payment Date:</label>
										<input type="date" data-date-inline-picker="true" class="form-control" id="secondPayDate" name="secondPayDate" value="<?php echo $objResult1['secondPayDate']; ?>">
										
										<label for="inputName">Second Payment Amount (RM):</label>
										<input name="secondPay" id="secondPay" class="form-control" type="number" step=".01" value="<?php echo $objResult1['secondPay']; ?>">
										
										<label for="lblNation">Second Payment Method:</label>
										<select class="form-control" name="secondMethod" id="secondMethod">
										<option value=""  style="font-style: italic;">-- Select Payment Method --</option>
										<option value="Cash" <?php echo ($objResult1['secondMethod'] === 'Cash') ? 'selected' : ''; ?>>Cash</option>
										<option value="Online" <?php echo ($objResult1['secondMethod'] === 'Online') ? 'selected' : ''; ?>>Online</option>
										</select>
										</div>
										
										<br> 
										
										<div class="form-group">
										<label for="inputName">Serial No. 3:</label>
										<input name="serialThree" id="serialThree" class="form-control" type="text" value="<?php echo $objResult1['serialThree']; ?>">
										
										<label for="lblDate">Third Payment Date:</label>
										<input type="date" data-date-inline-picker="true" class="form-control" id="thirdPayDate" name="thirdPayDate" value="<?php echo $objResult1['thirdPayDate']; ?>">
										
										<label for="inputName">Third Payment Amount (RM):</label>
										<input name="thirdPay" id="thirdPay" class="form-control" type="number" step=".01" value="<?php echo $objResult1['thirdPay']; ?>">
										
										<label for="lblNation">Third Payment Method:</label>
										<select class="form-control" name="thirdMethod" id="thirdMethod">
										<option value=""  style="font-style: italic;">-- Select Payment Method --</option>
										<option value="Cash" <?php echo ($objResult1['thirdMethod'] === 'Cash') ? 'selected' : ''; ?>>Cash</option>
										<option value="Online" <?php echo ($objResult1['thirdMethod'] === 'Online') ? 'selected' : ''; ?>>Online</option>
										</select>
										</div>
										
										<br> 
										
										<div class="form-group">
										<label for="inputName">Serial No. 4:</label>
										<input name="serialFour" id="serialFour" class="form-control" type="text" value="<?php echo $objResult1['serialFour']; ?>">
										
										<label for="lblDate">Fourth Payment Date:</label>
										<input type="date" data-date-inline-picker="true" class="form-control" id="fourthPayDate" name="fourthPayDate" value="<?php echo $objResult1['fourthPayDate']; ?>">
										
										<label for="inputName">Fourth Payment Amount (RM):</label>
										<input name="fourthPay" id="fourthPay" class="form-control" type="number" step=".01" value="<?php echo $objResult1['fourthPay']; ?>">
										
										<label for="lblNation">Fourth Payment Method:</label>
										<select class="form-control" name="fourthMethod" id="fourthMethod">
										<option value=""  style="font-style: italic;">-- Select Payment Method --</option>
										<option value="Cash" <?php echo ($objResult1['fourthMethod'] === 'Cash') ? 'selected' : ''; ?>>Cash</option>
										<option value="Online" <?php echo ($objResult1['fourthMethod'] === 'Online') ? 'selected' : ''; ?>>Online</option>
										</select>
										</div>
										
										<br> 
										
										<div class="form-group">
										<label for="inputName">Serial No. 5:</label>
										<input name="serialFive" id="serialFive" class="form-control" type="text" value="<?php echo $objResult1['serialFive']; ?>">
										
										<label for="lblDate">Fifth Payment Date:</label>
										<input type="date" data-date-inline-picker="true" class="form-control" id="fifthPayDate" name="fifthPayDate" value="<?php echo $objResult1['fifthPayDate']; ?>">
										
										<label for="inputName">Fifth Payment Amount (RM):</label>
										<input name="fifthPay" id="fifthPay" class="form-control" type="number" step=".01" value="<?php echo $objResult1['fifthPay']; ?>">
										
										<label for="lblNation">Fifth Payment Method:</label>
										<select class="form-control" name="fifthMethod" id="fifthMethod">
										<option value=""  style="font-style: italic;">-- Select Payment Method --</option>
										<option value="Cash" <?php echo ($objResult1['fifthMethod'] === 'Cash') ? 'selected' : ''; ?>>Cash</option>
										<option value="Online" <?php echo ($objResult1['fifthMethod'] === 'Online') ? 'selected' : ''; ?>>Online</option>
										</select>
										</div>
										
										<br> 
										
										<div class="form-group">
										<label for="inputName">Serial No. 6:</label>
										<input name="serialSix" id="serialSix" class="form-control" type="text" value="<?php echo $objResult1['serialSix']; ?>">
										
										<label for="lblDate">Sixth Payment Date:</label>
										<input type="date" data-date-inline-picker="true" class="form-control" id="sixthPayDate" name="sixthPayDate" value="<?php echo $objResult1['sixthPayDate']; ?>">
										
										<label for="inputName">Sixth Payment Amount (RM):</label>
										<input name="sixthPay" id="sixthPay" class="form-control" type="number" step=".01" value="<?php echo $objResult1['sixthPay']; ?>">
										
										<label for="lblNation">Sixth Payment Method:</label>
										<select class="form-control" name="sixthMethod" id="sixthMethod">
										<option value=""  style="font-style: italic;">-- Select Payment Method --</option>
										<option value="Cash" <?php echo ($objResult1['sixthMethod'] === 'Cash') ? 'selected' : ''; ?>>Cash</option>
										<option value="Online" <?php echo ($objResult1['sixthMethod'] === 'Online') ? 'selected' : ''; ?>>Online</option>
										</select>
										</div>
										
										<br> 
										
										<div class="form-group">
										<label for="inputName">Serial No. 7:</label>
										<input name="serialSeven" id="serialSeven" class="form-control" type="text" value="<?php echo $objResult1['serialSeven']; ?>">
										
										<label for="lblDate">Seventh Payment Date:</label>
										<input type="date" data-date-inline-picker="true" class="form-control" id="seventhPayDate" name="seventhPayDate" value="<?php echo $objResult1['seventhPayDate']; ?>">
										
										<label for="inputName">Seventh Payment Amount (RM):</label>
										<input name="seventhPay" id="seventhPay" class="form-control" type="number" step=".01" value="<?php echo $objResult1['seventhPay']; ?>">
										
										<label for="lblNation">Seventh Payment Method:</label>
										<select class="form-control" name="seventhMethod" id="seventhMethod">
										<option value=""  style="font-style: italic;">-- Select Payment Method --</option>
										<option value="Cash" <?php echo ($objResult1['seventhMethod'] === 'Cash') ? 'selected' : ''; ?>>Cash</option>
										<option value="Online" <?php echo ($objResult1['seventhMethod'] === 'Online') ? 'selected' : ''; ?>>Online</option>
										</select>
										</div>
										
										<br><br>
										
										<div class="form-group">
										<label for="lblNation">Payment Status:</label>
										<select class="form-control" name="payStatus" id="payStatus" required>
										<option value="">-- Select Payment Status --</option>
										<option value="ONGOING" <?php echo ($objResult1['payStatus'] === 'ONGOING') ? 'selected' : ''; ?>>ONGOING</option>
										<option value="DONE WITH SOCSO" <?php echo ($objResult1['payStatus'] === 'DONE WITH SOCSO') ? 'selected' : ''; ?>>PAYMENT DONE WITH SOCSO</option>
										<option value="DONE WITHOUT SOCSO" <?php echo ($objResult1['payStatus'] === 'DONE WITHOUT SOCSO') ? 'selected' : ''; ?>>PAYMENT DONE WITHOUT SOCSO</option>
										</select>
										</div>
											
										<div class="form-group">
										<label for="inputName">Total Amount Paid (RM):</label>
										<input name="totalPay" id="totalPay" class="form-control" type="text" readonly>
										</div>
										
										<script>
										// Get references to the input elements
										const firstPayInput = document.getElementById('firstPay');
										const totalPayInput = document.getElementById('totalPay');
										const paymentFields = [
											"secondPay", "thirdPay", "fourthPay",
											"fifthPay", "sixthPay", "seventhPay"
										];

										// Set initial value of totalPay input to first payment amount
										totalPayInput.value = firstPayInput.value;

										// Add event listeners to payment fields
										firstPayInput.addEventListener('input', updateTotalAmount);
										for (const field of paymentFields) {
											const fieldInput = document.getElementById(field);
											fieldInput.addEventListener('input', updateTotalAmount);
										}

										// Function to update the total amount
										function updateTotalAmount() {
											let totalAmount = parseFloat(firstPayInput.value) || 0;

											for (const field of paymentFields) {
												const fieldValue = parseFloat(document.getElementById(field).value) || 0;
												totalAmount += fieldValue;
											}

											totalPayInput.value = totalAmount.toFixed(2);
										}
										</script>


										
										<div class="form-group">
										<label for="inputName">Note :</label>
										<input name="payNote" id="payNote" class="form-control" type="text" value="<?php echo $objResult1['serialSeven']; ?>">
										</div>
										
										<div class="form-group">
										<label for="inputName">Employee Assigned :</label>
										<input name="payEmpAssign" id="payEmpAssign" class="form-control" type="text" value="<?php echo $objResult['emp_name']; ?>" readonly>
										</div>
									
										<div class="form-group" align="right">
										<div class="col-sm-12">
										<br>
										<button type="submit" class="btn btn-success">Submit</button>
										<!-- <button id="myButton" onclick="history.go(-1);" class="btn btn-warning">Cancel</button> -->
										
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
			document.getElementById("firstPayDate").setAttribute('max', today);
			document.getElementById("secondPayDate").setAttribute('max', today);
			document.getElementById("thirdPayDate").setAttribute('max', today);
			document.getElementById("fourthPayDate").setAttribute('max', today);
			document.getElementById("fifthPayDate").setAttribute('max', today);
			document.getElementById("sixthPayDate").setAttribute('max', today);
			document.getElementById("seventhPayDate").setAttribute('max', today);
			</script>
			
		

<?php
include "empFooter.php";                
?>