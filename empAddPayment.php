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
										<form method="post" name="formAddPermit" action="addPayment.php" enctype="multipart/form-data">
										
										<?php
										$strSQL1 = "SELECT * FROM fw WHERE fw_id = '".$_GET['fw_id']."' ";
										$objQuery1 = mysqli_query($con,$strSQL1);
										$objResult1 = mysqli_fetch_array($objQuery1);
										?>
										
										<input type="hidden" class="form-control" id="fw_id" name="fw_id" value="<?php echo $objResult1['fw_id']; ?>">
					
										<div class="form-group">
										<label for="inputName">Name:</label>
										<input name="fw_name" id="fw_name" class="form-control" type="text" value="<?php echo $objResult1['fw_name']; ?>" readonly>
										</div>
										
										<div class="form-group">
										<label for="inputName">Nationality:</label>
										<input name="fw_nation" id="fw_nation" class="form-control" type="text" value="<?php echo $objResult1['fw_nation']; ?>" readonly>
										</div> 
										
										<div class="form-group">
										<label for="inputName">Year:</label>
										<input name="fw_year" id="fw_year" class="form-control" type="text"  readonly>
										</div> <br>
										
										
										<div class="form-group">
										<label for="inputName">Serial No. 1:</label>
										<input name="serialOne" id="serialOne" class="form-control" type="number">
										
										<label for="lblDate">First Payment Date:</label>
										<input type="date" data-date-inline-picker="true" class="form-control" id="firstPayDate" name="firstPayDate" placeholder="dd/mm/yyyy" required>
										
										<label for="inputName">First Payment:</label>
										<input name="firstPay" id="firstPay" class="form-control" type="number" required>
																	
										<label for="lblNation">First Payment Method:</label>
										<select class="form-control" name="firstMethod" id="firstMethod" required>
										<option value="">-- Select Payment Method --</option>
										<option value="Cash">Cash</option>
										<option value="Online">Online</option>
										</select>
										</div>
										
										<br> 
										
										<div class="form-group">
										<label for="inputName">Serial No. 2:</label>
										<input name="serialTwo" id="serialTwo" class="form-control" type="number">
										
										<label for="lblDate">Second Payment Date:</label>
										<input type="date" data-date-inline-picker="true" class="form-control" id="secondPayDate" name="secondPayDate" placeholder="dd/mm/yyyy">
										
										<label for="inputName">Second Payment:</label>
										<input name="secondPay" id="secondPay" class="form-control" type="number">
										
										<label for="lblNation">Second Payment Method:</label>
										<select class="form-control" name="secondMethod" id="secondMethod">
										<option value="">-- Select Payment Method --</option>
										<option value="Cash">Cash</option>
										<option value="Online">Online</option>
										</select>
										</div>
										
										<br> 
										
										<div class="form-group">
										<label for="inputName">Serial No. 3:</label>
										<input name="serialThree" id="serialThree" class="form-control" type="number">
										
										<label for="lblDate">Third Payment Date:</label>
										<input type="date" data-date-inline-picker="true" class="form-control" id="thirdPayDate" name="thirdPayDate" placeholder="dd/mm/yyyy">
										
										<label for="lblNation">Third Payment Method:</label>
										<select class="form-control" name="thirdMethod" id="thirdMethod">
										<option value="">-- Select Payment Method --</option>
										<option value="Cash">Cash</option>
										<option value="Online">Online</option>
										</select>
										</div>
										
										<br><br>
											
										<div class="form-group">
										<label for="inputName">Total Amount Paid (RM):</label>
										<input name="totalPay" id="totalPay" class="form-control" type="text" readonly>
										</div>
										
										<div class="form-group">
										<label for="inputName">Note :</label>
										<input name="payNote" id="payNote" class="form-control" type="text">
										</div>
										
										<div class="form-group">
										<label for="inputName">Employee Assigned :</label>
										<input name="payEmpAssign" id="payEmpAssign" class="form-control" type="text" value="<?php echo $objResult['emp_name']; ?>" readonly>
										</div>
									
										<div class="form-group" align="right">
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
			
			<script>
			var today = new Date().toISOString().split('T')[0];
			document.getElementById("firstPayDate").setAttribute('max', today);
			document.getElementById("secondPayDate").setAttribute('max', today);
			document.getElementById("thirdPayDate").setAttribute('max', today);
			</script>
			
			
			<script type="text/javascript">


					function calculateTotal(){

						var chrg = document.getElementById("charge").value;


				  //Get selected data
				  var elt = document.getElementById("makeupLook");
				  var look = elt.options[elt.selectedIndex].value;

				  var elt = document.getElementById("person");
				  var prson = elt.options[elt.selectedIndex].value;

				  //convert data to integers
				  look = parseInt(look);
					chrg = parseInt(chrg);
						prson = parseInt(prson);

				  //calculate total value
						var plus = look+chrg;
				  var total = prson*plus;
						// var total = prson*plus;
						if (total > 800)
						{
					total = total*0.9 ;
						}
						else
						{
					total = total;
						}

				  //print value
				  document.getElementById("total_charge").value=total;

			 }

			 </script>
		

<?php
include "empFooter.php";                
?>