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
				$strSQL1 = "SELECT * FROM fw WHERE fw_id = '" . $_GET['fw_id'] . "' ";
				$objQuery1 = mysqli_query($con, $strSQL1);
				$objResult1 = mysqli_fetch_array($objQuery1);
				?>

				<input type="hidden" class="form-control" id="fw_id" name="fw_id"
					value="<?php echo $objResult1['fw_id']; ?>">

				<div class="form-group">
					<label for="inputName">Name :</label>
					<input name="fw_name" id="fw_name" class="form-control" type="text"
						value="<?php echo $objResult1['fw_name']; ?>">
				</div>

				<div class="form-group">
					<label for="inputName">Nationality :</label>
					<input name="fw_nation" id="fw_nation" class="form-control" type="text"
						value="<?php echo $objResult1['fw_nation']; ?>" readonly>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Phone No :</label>
					<input type="number" class="form-control" name="fw_phone" id="fw_phone"
						value="<?php echo $objResult1['fw_phone']; ?>">
				</div>

				<div class="form-group">
					<input type="number" class="form-control" name="fw_phone2" id="fw_phone2"
						value="<?php echo $objResult1['fw_phone2']; ?>">
				</div>

				<div class="form-group">
					<!-- <label for="exampleInputEmail1">Phone No :</label> -->
					<input type="number" class="form-control" name="fw_phone3" id="fw_phone3"
						value="<?php echo $objResult1['fw_phone3']; ?>">
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Address :</label>
					<input type="text" class="form-control" name="fw_address" id="fw_address"
						value="<?php echo $objResult1['fw_address']; ?>">
				</div>


				<div class="form-group">
					<label for="exampleInputEmail1">Gender :</label>
					<input type="text" class="form-control" name="fw_gender" id="fw_gender"
						value="<?php echo $objResult1['fw_gender']; ?>" readonly>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Intake Type :</label>
					<input type="text" class="form-control" name="fw_intake" id="fw_intake"
						value="<?php echo $objResult1['fw_intake']; ?>" readonly>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Agency Registered :</label>
					<input type="text" class="form-control" name="fw_register" id="fw_register"
						value="<?php echo $objResult1['fw_register']; ?>" readonly>
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Note :</label>
					<input type="text" class="form-control" name="fw_remarks" id="fw_remarks"
						value="<?php echo $objResult1['fw_remarks']; ?>">
				</div>

				<div class="form-group">
					<label for="inputName">Employee Assigned :</label>
					<input name="emp_name" id="emp_name" class="form-control" type="text"
						value="<?php echo $objResult1['emp_assigned']; ?>" readonly>
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
			echo "<a href='empAddPass.php?fw_id=" . $_GET['fw_id'] . "' ><button type='button' class='btn btn-success'>Insert Passport Data</button></a>"
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
									<th>Passport Taken Date</th>
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
										echo "<td>" . $row["passTakenDate"] . "</td>";
										echo "<td>" . $fileName . "</td>";
										echo "<td>" . $row["passNote"] . "</td>";
										echo "<td>
												<a href='empUpdatePass.php?passNo=" . $row["passNo"] . "' ><center><button type='button' class='btn btn-warning'>Update</button></center></a>  
												<br><br>
												<a href='deletePass.php?passNo=" . $row["passNo"] . "' ><center><button type='button' onclick='return checkDelete()' class='btn btn-danger pull-right'>Delete</button></center></a>
											</td>";
										echo "</tr>";
									}
								} else {
									echo "<tr>";
									echo "<td colspan='5'>No Result</td>";
									echo "</tr>";
								}
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
			echo "<a href='empAddPermit.php?fw_id=" . $_GET['fw_id'] . "' ><button type='button' class='btn btn-success'>Insert Permit Data</button></a>"
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
									<th>Permit Status</th>
									<th>Permit Year</th>
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
										echo "<td>" . $row["permitStatus"] . "</td>";
										echo "<td>" . $row["permitYear"] . "</td>";
										echo "<td>" . $row["permitFile"] . "</td>";
										echo "<td>" . $row["permitNote"] . "</td>";
										echo "<td>
                                                                 <a href='empUpdatePermit.php?permitNo=" . $row["permitNo"] . "' ><button type='button' class='btn btn-warning'>Update</button></a> 
																 <br><br>
                                                                 <a href='deletePermit.php?permitNo=" . $row["permitNo"] . "' ><button type='button' onclick='return checkDelete()' class='btn btn-danger pull-right'>Delete</button></a>
																		</td>";
										echo "</tr>";
									}
								} else {
									echo "<tr>";
									echo "<td colspan='5'>No Result</td>";
									echo "</tr>";
								}
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
			echo "<a href='empAddMedic.php?fw_id=" . $_GET['fw_id'] . "' ><button type='button' class='btn btn-success'>Insert Medical Data</button></a>"
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
                                                                <div align='center'><a href='empUpdateMedic.php?medicalNo=" . $row["medicalNo"] . "' ><button type='button' class='btn btn-warning'>Update</button></a>  
														
                                                                <a href='deleteMedic.php?medicalNo=" . $row["medicalNo"] . "' ><button type='button' onclick='return checkDelete()' class='btn btn-danger pull-right'>Delete</button></a>
																		</div></td>";
										echo "</tr>";
									}
								} else {
									echo "<tr>";
									echo "<td colspan='5'>No Result</td>";
									echo "</tr>";
								}
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
			echo "<a href='empAddFinger.php?fw_id=" . $_GET['fw_id'] . "' ><button type='button' class='btn btn-success'>Insert Fingerprint Data</button></a>"
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
                                                                <a href='empUpdateFinger.php?fingerNo=" . $row["fingerNo"] . "' ><button type='button' class='btn btn-warning'>Update</button></a>  
																<br><br>
                                                                <a href='deleteFinger.php?fingerNo=" . $row["fingerNo"] . "' ><button type='button' onclick='return checkDelete()' class='btn btn-danger pull-right'>Delete</button></a>
																		</td>";
										echo "</tr>";
									}
								} else {
									echo "<tr>";
									echo "<td colspan='5'>No Result</td>";
									echo "</tr>";
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
			echo "<a href='empAddMajikan.php?fw_id=" . $_GET['fw_id'] . "' ><button type='button' class='btn btn-success'>Insert Employer Data</button></a>"
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
                                                                <a href='empUpdateMajikan.php?majikanNo=" . $row["majikanNo"] . "' ><button type='button' class='btn btn-warning'>Update</button></a>  
																<br><br>
                                                                <a href='deleteMajikan.php?majikanNo=" . $row["majikanNo"] . "' ><button type='button' onclick='return checkDelete()' class='btn btn-danger pull-right'>Delete</button></a>
																		</td>";
										echo "</tr>";
									}
								} else {
									echo "<tr>";
									echo "<td colspan='5'>No Result</td>";
									echo "</tr>";
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
			echo "<a href='empAddPayment.php?fw_id=" . $_GET['fw_id'] . "' ><button type='button' class='btn btn-success'>Insert Payment Data</button></a>"
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
									<th>Permit Status</th>
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

								$sql = "SELECT * FROM passport WHERE fw_id = '" . $_GET['fw_id'] . "' ";

								$result = mysqli_query($con, $sql);

								$i = 0;
								// Associative array
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										$i++;
										echo "<tr>";
										echo "<td>" . $i . "</td>";
										echo "<td>" . $row["passNo"] . "</td>";
										echo "<td>" . $row["passIssuedDate"] . "</td>";
										echo "<td>" . $row["passExpDate"] . "</td>";
										echo "<td>" . $row["passTakenDate"] . "</td>";
										echo "<td>" . $row["passTakenDate"] . "</td>";
										echo "<td>" . $row["passFile"] . "</td>";
										echo "<td>" . $row["passNote"] . "</td>";
										echo "<td>
                                                                <a href='empUpdatePermit.php?passNo=" . $row["passNo"] . "' ><button type='button' class='btn btn-warning'>Update</button></a>  
																<br><br>
                                                                <a href='deletePermit.php?passNo=" . $row["passNo"] . "' ><button type='button' onclick='return checkDelete()' class='btn btn-danger pull-right'>Delete</button></a>
																		</td>";
										echo "</tr>";
									}
								} else {
									echo "<tr>";
									echo "<td colspan='5'>No Result</td>";
									echo "</tr>";
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


<?php
include "empFooter.php";
?>