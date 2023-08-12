<?php require_once("config.php"); ?>
<?php
session_start();
if ($_SESSION['emp_ic'] == "") {
	echo "<script>alert('Please Login!');";
	echo "window.location.href = 'index.php';</script>";
	exit();
}


$strSQL = "SELECT * FROM employee WHERE emp_ic = '" . $_SESSION['emp_ic'] . "' ";
$objQuery = mysqli_query($con, $strSQL);
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
				<a href="empFWList.php">Foreign Workers List</a>
				<i class="fa fa-angle-right"></i>
				<span>Details</span>
			</h2>
		</div>

		<div class="grid-form">
			<form method="post" name="formAddFW" action="updateFW.php">

				<?php
				$strSQL1 = "SELECT * from fw WHERE fw_id = '".$_GET['fw_id']."' ";
				$objQuery1 = mysqli_query($con, $strSQL1);
				$objResult1 = mysqli_fetch_array($objQuery1);
				
				$strSQL2 = "SELECT * from majikan WHERE fw_id = '".$_GET['fw_id']."' ";
				$objQuery2 = mysqli_query($con, $strSQL2);
				$objResult2 = mysqli_fetch_array($objQuery2);
				?>

				<input type="hidden" class="form-control" id="fw_id" name="fw_id"
					value="<?php echo $objResult1['fw_id']; ?>">

				<div class="form-group">
					<label for="inputName">Name:</label>
					<input name="fw_name" id="fw_name" class="form-control" type="text" value="<?php echo $objResult1['fw_name']; ?>">
				</div>
				
				<div class="form-group">
				<label for="exampleInputEmail1">Foreign Worker's Year :</label>
				<input type="number" class="form-control" name="fw_year" id="fw_year" value="<?php echo $objResult1['fw_year']; ?>">
				</div>
				
				<div class="form-group">
				<label for="lblNation">Nationality :</label>
					<select class="form-control" name="fw_nation" id="fw_nation">
					<option value="Bangladesh" <?php echo ($objResult1['fw_nation'] === 'Bangladesh') ? 'selected' : ''; ?>>Bangladesh</option>
					<option value="Cambodia" <?php echo ($objResult1['fw_nation'] === 'Cambodia') ? 'selected' : ''; ?>>Cambodia</option>
					<option value="China" <?php echo ($objResult1['fw_nation'] === 'China') ? 'selected' : ''; ?>>China</option>
					<option value="India" <?php echo ($objResult1['fw_nation'] === 'India') ? 'selected' : ''; ?>>India</option>
					<option value="Indonesia" <?php echo ($objResult1['fw_nation'] === 'Indonesia') ? 'selected' : ''; ?>>Indonesia</option>
					<option value="Laos" <?php echo ($objResult1['fw_nation'] === 'Laos') ? 'selected' : ''; ?>>Laos</option>
					<option value="Myanmar" <?php echo ($objResult1['fw_nation'] === 'Myanmar') ? 'selected' : ''; ?>>Myanmar</option>
					<option value="Nepal" <?php echo ($objResult1['fw_nation'] === 'Nepal') ? 'selected' : ''; ?>>Nepal</option>
					<option value="Pakistan" <?php echo ($objResult1['fw_nation'] === 'Pakistan') ? 'selected' : ''; ?>>Pakistan</option>
					<option value="Philippines" <?php echo ($objResult1['fw_nation'] === 'Philippines') ? 'selected' : ''; ?>>Philippines</option>
					<option value="Sri Lanka" <?php echo ($objResult1['fw_nation'] === 'Sri Lanka') ? 'selected' : ''; ?>>Sri Lanka</option>
					<option value="Thailand" <?php echo ($objResult1['fw_nation'] === 'Thailand') ? 'selected' : ''; ?>>Thailand</option>
					<option value="Timor-Leste" <?php echo ($objResult1['fw_nation'] === 'Timor-Leste') ? 'selected' : ''; ?>>Timor-Leste (East Timor)</option>
					<option value="Vietnam" <?php echo ($objResult1['fw_nation'] === 'Vietnam') ? 'selected' : ''; ?>>Vietnam</option>
					</select>
				</div>

				<div class="form-group">
				<label for="exampleInputEmail1">Phone No (1):</label>
				<input type="number" class="form-control" name="fw_phone" id="fw_phone" value="<?php echo $objResult1['fw_phone']; ?>">
				</div>
				
				<div class="form-group">
				<label for="exampleInputEmail1">Phone No (2):</label>
				<input type="number" class="form-control" name="fw_phone2" id="fw_phone2" value="<?php echo $objResult1['fw_phone2']; ?>">
				</div>
				
				<div class="form-group">
				<label for="exampleInputEmail1">Phone No (3):</label>
				<input type="number" class="form-control" name="fw_phone3" id="fw_phone3" value="<?php echo $objResult1['fw_phone3']; ?>">
				</div>

				<div class="form-group">
				<label for="exampleInputEmail1">Address :</label>
				<input type="text" class="form-control" name="fw_address" id="fw_address" value="<?php echo $objResult1['fw_address']; ?>">
				</div>
				
				<div class="form-group">
				<label for="lblGender">Gender :</label>
					<select class="form-control" name="fw_gender" id="fw_gender">
					<option value=""  style="font-style: italic;">-- Select Gender --</option>
					<option value="Male" <?php echo ($objResult1['fw_gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
					<option value="Female" <?php echo ($objResult1['fw_gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
					</select>
				</div>
				
				<br>
				
				<div class="form-group">
				<label for="lblGender">Agency Registered :</label>
					<select class="form-control" name="fw_register" id="fw_register">
					<option value=""  style="font-style: italic;">-- Select Agency --</option>
					<option value="TQM" <?php echo ($objResult1['fw_register'] === 'TQM') ? 'selected' : ''; ?>>TQM</option>
					<option value="BUMINUR" <?php echo ($objResult1['fw_register'] === 'BUMINUR') ? 'selected' : ''; ?>>BUMINUR</option>
					<option value="GOLDENSPEC" <?php echo ($objResult1['fw_register'] === 'GOLDENSPEC') ? 'selected' : ''; ?>>GOLDENSPEC</option>
					<option value="OTHERS" <?php echo ($objResult1['fw_register'] === 'OTHERS') ? 'selected' : ''; ?>>OTHERS</option>
					</select>
				</div>
						
				<div class="form-group" id="otherInput" style="<?php echo ($objResult1['fw_register'] === 'OTHERS') ? 'display: block;' : 'display: none;'; ?>">
				<label for="majikanName">Employer Name:</label>
				<input type="text" class="form-control" name="majikanName" id="majikanName" value="<?php echo isset($objResult2['majikanName']) ? $objResult2['majikanName'] : ''; ?>">
				</div>
				
				<br>
				
				<div class="form-group">
				<label for="lblGender">Intake Type:</label>
				<select class="form-control" name="fw_intake" id="fw_intake">
				<option value=""  style="font-style: italic;">-- Select Intake --</option>
				<option value="RTK 1" <?php echo ($objResult1['fw_intake'] === 'RTK 1') ? 'selected' : ''; ?>>RTK 1.0</option>
				<option value="RTK 2" <?php echo ($objResult1['fw_intake'] === 'RTK 2') ? 'selected' : ''; ?>>RTK 2.0</option>
				<option value="CALLING VISA" <?php echo ($objResult1['fw_intake'] === 'CALLING VISA') ? 'selected' : ''; ?>>CALLING VISA</option>
				</select>
				</div>

				<div class="form-group" id="cvDateInputDiv" <?php echo ($objResult1['fw_intake'] === 'CALLING VISA') ? '' : 'style="display: none;"'; ?>>
				<label for="lblDate">Calling Visa Date:</label>
				<input type="date" data-date-inline-picker="true" class="form-control" id="cvDateInput" name="cvDateInput" value="<?php echo $objResult1['cvDateInput']; ?>">
				</div>

				<div class="form-group" id="cvBatchInputDiv" <?php echo ($objResult1['fw_intake'] === 'CALLING VISA') ? '' : 'style="display: none;"'; ?>>
				<label for="lblDate">Calling Visa Batch:</label>
				<input type="number" class="form-control" id="cvBatchInput" name="cvBatchInput" value="<?php echo $objResult1['cvBatchInput']; ?>">
				</div>
				
				<br>
				
				<div class="form-group">
				<label for="exampleInputEmail1">Note :</label>
				<input type="text" class="form-control" name="fw_remarks" id="fw_remarks" value="<?php echo $objResult1['fw_remarks']; ?>">
				</div>

				<div class="form-group">
					<label for="inputName">Employee Assigned :</label>
					<input name="emp_name" id="emp_name" class="form-control" type="text" value="<?php echo $objResult1['emp_assigned']; ?>" readonly>
				</div>


				<div class="form-group" align="right">
					<div class="col-sm-12">
						<br>
						<button type="submit" id="myButton" class="btn btn-warning">Update Details</button>
					</div>
				</div>

				<br><br>

			</form>
		</div>

		<br><br>

		<!-- Tab links -->
		<div class="tab">
			<button class="tablinks" onclick="openCity(event, 'Passport')" id="defaultOpen">Passport</button>
			<button class="tablinks" onclick="openCity(event, 'Permit')">Permit</button>
			<button class="tablinks" onclick="openCity(event, 'Medical')">Medical</button>
			<button class="tablinks" onclick="openCity(event, 'Fingerprint')">Fingerprint (RTK)</button>
			<button class="tablinks" onclick="openCity(event, 'Employer')">Employer Details</button>
			<button class="tablinks" onclick="openCity(event, 'Payment')">Payment</button>
		</div>

		<!-- Tab content -->
		<div id="Passport" class="tabcontent">
			<br>
			<?php
			echo "<a href='empAddPass.php?fw_id=" . $_GET['fw_id'] . "' ><button type='button' class='btn btn-success'>+ Insert Passport Data</button></a>"
				?>
			<br><br>
			<div class='panel panel-primary'>
				<div class='panel-body'>
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="example">
							<thead>
								<tr>
									<th>No</th>
									<th>Passport Number</th>
									<th>Passport Issued Date</th>
									<th>Passport Expiry Date</th>
									<th>Passport File</th>
									<th>Remarks</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								//connect
								include 'config.php';

								// Check connection
								if (mysqli_connect_errno()) {
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}

								$sql = "SELECT * FROM passport WHERE fw_id = '" . $_GET['fw_id'] . "' ";

								$result = mysqli_query($con, $sql);

								$i = 0;
								// Associative array
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										$i++;

										$filePath = $row['passFile'];
										$fileName = basename($filePath);

										echo "<tr>";
										echo "<td>" . $i . "</td>";
										echo "<td>" . $row["passNo"] . "</td>";
										echo "<td>" . $row["passIssuedDate"] . "</td>";
										echo "<td>" . $row["passExpDate"] . "</td>";
										echo "<td>" . $fileName . "</td>";
										echo "<td>" . $row["passNote"] . "</td>";
										echo "<td>
											  <div class='d-flex justify-content-center'>
												<a href='empUpdatePass.php?passNo=" . $row["passNo"] . "'>
												  <button type='button' class='btn btn-warning'>Update</button>
												</a>  
											  </div>	
											  <br>  
											  <div class='d-flex justify-content-center'>
												<a href='deletePass.php?passNo=" . $row["passNo"] . "'>
												<button type='button' onclick='return confirm(\"Are you sure you want to delete this passport data?\")' class='btn btn-danger pull-right'>Delete</button>
												</a>
											   </div>
											   
											</td>";
										echo "</tr>";
									}
								} 
								
								// else {
									// echo "<tr>";
									// echo "<td colspan='8'>No Result</td>";
									// echo "</tr>";
								// }
								
								mysqli_close($con);
								?>
							</tbody>
						</table>

					</div>
				</div>

			</div>
		</div>

		<div id="Permit" class="tabcontent">
			<br>
			<?php
			echo "<a href='empAddPermit.php?fw_id=" . $_GET['fw_id'] . "' ><button type='button' class='btn btn-success'>+ Insert Permit Data</button></a>"
				?>
			<br><br>
			<div class='panel panel-primary'>
				<div class='panel-body'>
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="example">
							<thead>
								<tr>
									<th>No</th>
									<th>Permit Number</th>
									<th>Permit Issued Date</th>
									<th>Permit Expiry Date</th>
									<th>Permit Taken Date</th>
									<th>Permit Method</th>
									<th>Permit File</th>
									<th>Remarks</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								//connect
								include 'config.php';

								// Check connection
								if (mysqli_connect_errno()) {
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}

								$sql = "SELECT * FROM permit WHERE fw_id = '" . $_GET['fw_id'] . "' ";

								$result = mysqli_query($con, $sql);

								$i = 0;
								// Associative array
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										$i++;
										echo "<tr>";
										echo "<td>" . $i . "</td>";
										echo "<td>" . $row["permitNo"] . "</td>";
										echo "<td>" . $row["permitIssuedDate"] . "</td>";
										echo "<td>" . $row["permitExpDate"] . "</td>";
										echo "<td>" . $row["permitTakenDate"] . "</td>";
										echo "<td>" . $row["permitMethod"] . "</td>";
										echo "<td>" . $row["permitFile"] . "</td>";
										echo "<td>" . $row["permitNote"] . "</td>";
										echo "<td>
											   <div class='d-flex justify-content-center'>
												<a href='empUpdatePermit.php?permitNo=" . $row["permitNo"] . "' ><button type='button' class='btn btn-warning'>Update</button></a> 
											   </div>			 
											   <br>
											   <div class='d-flex justify-content-center'>
												<a href='deletePermit.php?permitNo=" . $row["permitNo"] . "'>
												<button type='button' onclick='return confirm(\"Are you sure you want to delete this permit data?\")' class='btn btn-danger pull-right'>Delete</button>
												</a>
											   </div>
											  </td>";
										echo "</tr>";
									}
								} 
								
								// else {
									// echo "<tr>";
									// echo "<td colspan='10'>No Result</td>";
									// echo "</tr>";
								// }
								
								
								mysqli_close($con);
								?>
							</tbody>
						</table>

					</div>
				</div>

			</div>
		</div>

		<div id="Medical" class="tabcontent">
			<br>
			<?php
			echo "<a href='empAddMedic.php?fw_id=" . $_GET['fw_id'] . "' ><button type='button' class='btn btn-success'>+ Insert Medical Data</button></a>"
				?>
			<br><br>
			<div class='panel panel-primary'>
				<div class='panel-body'>
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="example">
							<thead>
								<tr>
									<th>No</th>
									<th>Medical Date</th>
									<th>Immigration Sent Date</th>
									<th>Medical Status</th>
									<th>Remarks</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								//connect
								include 'config.php';

								// Check connection
								if (mysqli_connect_errno()) {
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}

								$sql = "SELECT * FROM medical WHERE fw_id = '" . $_GET['fw_id'] . "' ";

								$result = mysqli_query($con, $sql);

								$i = 0;
								// Associative array
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										$i++;
										echo "<tr>";
										echo "<td>" . $i . "</td>";
										echo "<td>" . $row["medicalDate"] . "</td>";
										echo "<td>" . $row["immDate"] . "</td>";
										echo "<td>" . $row["medicalStatus"] . "</td>";
										echo "<td>" . $row["medicNote"] . "</td>";
										echo "<td>
											  <div class='d-flex justify-content-center'>
											  <a href='empUpdateMedic.php?medicalNo=" . $row["medicalNo"] . "' ><button type='button' class='btn btn-warning'>Update</button></a>  
											  </div>
											  <br>
											  <div class='d-flex justify-content-center'>
											  <a href='deleteMedic.php?medicalNo=" . $row["medicalNo"] . "'>
											  <button type='button' onclick='return confirm(\"Are you sure you want to delete this medical data?\")' class='btn btn-danger pull-right'>Delete</button>
											  </a>
											  </div>
											  </td>";
										echo "</tr>";
									}
								} 
								
								// else {
									// echo "<tr>";
									// echo "<td colspan='6'>No Result</td>";
									// echo "</tr>";
								// }
								
								
								mysqli_close($con);
								?>
							</tbody>
						</table>

					</div>
				</div>

			</div>
		</div>

		<div id="Fingerprint" class="tabcontent">
			<br>
			<?php
			echo "<a href='empAddFinger.php?fw_id=" . $_GET['fw_id'] . "' ><button type='button' class='btn btn-success'>+ Insert Fingerprint Data</button></a>"
				?>
			<br><br>
			<div class='panel panel-primary'>
				<div class='panel-body'>
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="example">
							<thead>
								<tr>
									<th>No</th>
									<th>Fingerprint Date</th>
									<th>Fingerprint Batch</th>
									<th>Fingerprint Status</th>
									<th>Remarks</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								//connect
								include 'config.php';

								// Check connection
								if (mysqli_connect_errno()) {
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}

								$sql = "SELECT * FROM fingerprint WHERE fw_id = '" . $_GET['fw_id'] . "' ";

								$result = mysqli_query($con, $sql);

								$i = 0;
								// Associative array
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										$i++;
										echo "<tr>";
										echo "<td>" . $i . "</td>";
										echo "<td>" . $row["fingerDate"] . "</td>";
										echo "<td>" . $row["fingerBatch"] . "</td>";
										echo "<td>" . $row["fingerStatus"] . "</td>";
										echo "<td>" . $row["fingerNote"] . "</td>";
										echo "<td>
											  <div class='d-flex justify-content-center'>
                                              <a href='empUpdateFinger.php?fingerNo=" . $row["fingerNo"] . "' ><button type='button' class='btn btn-warning'>Update</button></a>  
											  </div>	
											  <br>
											  <div class='d-flex justify-content-center'>
                                              <a href='deleteFinger.php?fingerNo=" . $row["fingerNo"] . "' >
											  <button type='button' onclick='return confirm(\"Are you sure you want to delete this fingerprint data?\")' class='btn btn-danger pull-right'>Delete</button>
											  </a>
											  </div>						
											  </td>";
										echo "</tr>";
									}
								} 								
								
								mysqli_close($con);
								?>
							</tbody>
						</table>

					</div>
				</div>

			</div>
		</div>


		<div id="Employer" class="tabcontent">
			<br>
			<?php
			echo "<a href='empAddMajikan.php?fw_id=" . $_GET['fw_id'] . "' ><button type='button' class='btn btn-success'>+ Insert Employer Data</button></a>"
				?>
			<br><br>
			<div class='panel panel-primary'>
				<div class='panel-body'>
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="example">
							<thead>
								<tr>
									<th>No</th>
									<th>Employer Name</th>
									<th>Employer Phone (1)</th>
									<th>Employer Phone (2)</th>
									<th>Employer Email (1)</th>
									<th>Employer Email (2)</th>
									<th>Remarks</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								//connect
								include 'config.php';

								// Check connection
								if (mysqli_connect_errno()) {
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}

								$sql = "SELECT * FROM majikan WHERE fw_id = '" . $_GET['fw_id'] . "' ";

								$result = mysqli_query($con, $sql);

								$i = 0;
								// Associative array
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										$i++;
										echo "<tr>";
										echo "<td>" . $i . "</td>";
										echo "<td>" . $row["majikanName"] . "</td>";
										echo "<td>" . $row["majikanPhone"] . "</td>";
										echo "<td>" . $row["majikanPhone2"] . "</td>";
										echo "<td>" . $row["majikanEmail"] . "</td>";
										echo "<td>" . $row["majikanEmail2"] . "</td>";
										echo "<td>" . $row["majikanNote"] . "</td>";
										echo "<td>
											  <div class='d-flex justify-content-center'>
                                              <a href='empUpdateMajikan.php?majikanNo=" . $row["majikanNo"] . "' ><button type='button' class='btn btn-warning'>Update</button></a>  
											  </div>				
											  <br>
											  <div class='d-flex justify-content-center'>
                                              <a href='deleteMajikan.php?majikanNo=" . $row["majikanNo"] . "' ><button type='button' onclick='return confirm(\"Are you sure you want to delete this employer data?\")' class='btn btn-danger pull-right'>Delete</button>
											  </a>
											  </div>
											  </td>";
										echo "</tr>";
									}
								} 
								
								mysqli_close($con);
								?>
							</tbody>
						</table>

					</div>
				</div>

			</div>
		</div>



		<div id="Payment" class="tabcontent">
			<br>
			<?php
			echo "<a href='empAddPayment.php?fw_id=" . $_GET['fw_id'] . "' ><button type='button' class='btn btn-success'>+ Insert Payment Data</button></a>"
				?>
			<br><br>
			<div class='panel panel-primary'>
				<div class='panel-body'>
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="example">
							<thead>
								<tr>
									<th>No</th>
									<th>Foreign Worker Type</th>
									<th>Payment Status</th>
									<th>Total Amount Paid (RM)</th>
									<th>Remarks</th>
									<th>1st Serial No</th>
									<th>1st Payment Date</th>
									<th>1st Payment Amount</th>
									<th>1st Payment Method</th>
									<th>2nd Serial No</th>
									<th>2nd Payment Date</th>
									<th>2nd Payment Amount</th>
									<th>2nd Payment Method</th>
									<th>3rd Serial No</th>
									<th>3rd Payment Date</th>
									<th>3rd Payment Amount</th>
									<th>3rd Payment Method</th>
									<th>4th Serial No</th>
									<th>4th Payment Date</th>
									<th>4th Payment Amount</th>
									<th>4th Payment Method</th>
									<th>5th Serial No</th>
									<th>5th Payment Date</th>
									<th>5th Payment Amount</th>
									<th>5th Payment Method</th>
									<th>6th Serial No</th>
									<th>6th Payment Date</th>
									<th>6th Payment Amount</th>
									<th>6th Payment Method</th>
									<th>7th Serial No</th>
									<th>7th Payment Date</th>
									<th>7th Payment Amount</th>
									<th>7th Payment Method</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							
								<?php
								
								include 'config.php';

								
								if (mysqli_connect_errno()) {
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}

								$sql = "SELECT * FROM payment WHERE fw_id = '" . $_GET['fw_id'] . "' ";

								$result = mysqli_query($con, $sql);

								$i = 0;
								
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										$i++;
										echo "<tr>";
										echo "<td>" . $i . "</td>";
										echo "<td>" . $row["fwType"] . "</td>";
										echo "<td>" . $row["payStatus"] . "</td>";
										echo "<td>" . $row["totalPay"] . "</td>";
										echo "<td>" . $row["payNote"] . "</td>";
										echo "<td>" . $row["serialOne"] . "</td>";
										echo "<td>" . $row["firstPayDate"] . "</td>";
										echo "<td>" . $row["firstPay"] . "</td>";
										echo "<td>" . $row["firstMethod"] . "</td>";
										echo "<td>" . $row["serialTwo"] . "</td>";
										echo "<td>" . $row["secondPayDate"] . "</td>";
										echo "<td>" . $row["secondPay"] . "</td>";
										echo "<td>" . $row["secondMethod"] . "</td>";
										echo "<td>" . $row["serialThree"] . "</td>";
										echo "<td>" . $row["thirdPayDate"] . "</td>";
										echo "<td>" . $row["thirdPay"] . "</td>";
										echo "<td>" . $row["thirdMethod"] . "</td>";
										echo "<td>" . $row["serialFour"] . "</td>";
										echo "<td>" . $row["fourthPayDate"] . "</td>";
										echo "<td>" . $row["fourthPay"] . "</td>";
										echo "<td>" . $row["fourthMethod"] . "</td>";
										echo "<td>" . $row["serialFive"] . "</td>";
										echo "<td>" . $row["fifthPayDate"] . "</td>";
										echo "<td>" . $row["fifthPay"] . "</td>";
										echo "<td>" . $row["fifthMethod"] . "</td>";
										echo "<td>" . $row["serialSix"] . "</td>";
										echo "<td>" . $row["sixthPayDate"] . "</td>";
										echo "<td>" . $row["sixthPay"] . "</td>";
										echo "<td>" . $row["sixthMethod"] . "</td>";
										echo "<td>" . $row["serialSeven"] . "</td>";
										echo "<td>" . $row["seventhPayDate"] . "</td>";
										echo "<td>" . $row["seventhPay"] . "</td>";
										echo "<td>" . $row["seventhMethod"] . "</td>";
										echo "<td>
											  <div class='d-flex justify-content-center'>
                                              <a href='empUpdatePayment.php?payNo=" . $row["payNo"] . "' ><button type='button' class='btn btn-warning'>Update</button></a>  
											  </div>
											  <br>
											  <div class='d-flex justify-content-center'>
                                              <a href='deletePayment.php?payNo=" . $row["payNo"] . "' ><button type='button' onclick='return confirm(\"Are you sure you want to delete this payment data?\")' class='btn btn-danger pull-right'>Delete</button>
											  </a>
											  </div>
											  </td>";
										echo "</tr>";
									}
								} 
								
								
								mysqli_close($con);
								?>
								
							</tbody>
						</table>

					</div>
				</div>

			</div>
		</div>

		<br><br><br>




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

	function openCity(evt, cityName) {
		// Declare all variables
		var i, tabcontent, tablinks;

		// Get all elements with class="tabcontent" and hide them
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}

		// Get all elements with class="tablinks" and remove the class "active"
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}

		// Show the current tab, and add an "active" class to the button that opened the tab
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}

	document.getElementById("defaultOpen").click();

</script>

<script>
    document.getElementById("fw_intake").addEventListener("change", function () {
        const selectedValue = this.value;
        const cvDateInputDiv = document.getElementById("cvDateInputDiv");
        const cvBatchInputDiv = document.getElementById("cvBatchInputDiv");

        if (selectedValue === "CALLING VISA") {
            cvDateInputDiv.style.display = "block";
            cvBatchInputDiv.style.display = "block";
        } else {
            cvDateInputDiv.style.display = "none";
            cvBatchInputDiv.style.display = "none";
        }
    });
</script>

<script>
  // Function to toggle the display of the "Employer Name" input field based on the selected option
  function toggleOtherInput() {
    var selectedOption = $("#fw_register").val();
    if (selectedOption === "OTHERS") {
      $("#otherInput").show();
    } else {
      $("#otherInput").hide();
    }
  }

  // Call the function initially to set the correct display state
  toggleOtherInput();

  // Add an event listener to the select element to detect changes
  $("#fw_register").on("change", function() {
    toggleOtherInput();
  });
</script>

<script>
var today = new Date().toISOString().split('T')[0];
document.getElementById("cvDateInput").setAttribute('max', today);
</script>


<?php
include "empFooter.php";
?>