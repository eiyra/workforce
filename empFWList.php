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
							<span>Foreign Workers List</span>
						</h2>
					</div>

         <div class="grid-system">
						<div class="horz-grid">
							<div class="grid-hor">
								
								<?php
									if ( (isset($_GET['success'])) )
									{
										$emp_ic = $_GET['success'];

										echo "<div class='alert alert-success'>";
										echo	"<strong>Succesfully added!</strong>";
										echo "</div>";
									}
								?>
								
								<?php
									if ( (isset($_GET['error_insert'])) )
									{
										$emp_ic = $_GET['error_insert'];

										echo "<div class='alert alert-danger'>";
										echo	"<strong>Warning error inserting data!</strong>";
										echo "</div>";
									}
								?>
								
								<?php
									if ( (isset($_GET['successExcel'])) )
									{
										$successExcel = $_GET['successExcel'];

										echo "<div class='alert alert-success'>";
										echo	"<strong>Succesfully!</strong> registered.";
										echo "</div>";
									}
								?>
								
								<a href="empAddFW.php"><button type="button" class="btn btn-primary">+ Add Foreign Worker</button></a>
								<br><br>
								<div class='panel panel-primary'>
									<div class='panel-body'>
										<div class="table-responsive">
											<table class="table table-bordered table-hover" id="example" style="width:100%">
												<thead>
													<tr>
														<th>No</th>
														<th>Name</th>
														<th>Nationality</th>
														<th>Phone Number (1)</th>
														<th>Phone Number (2)</th>
														<th>Phone Number (3)</th>
														<th>Gender</th>
														<th>Address</th>
														<th>Intake Type</th>
														<th>Agency Registered</th>
														<th>Note</th>
														<th>Employee Assigned</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<?php
														//connect
														include 'config.php';

														// Check connection
														if (mysqli_connect_errno())
														{
															echo "Failed to connect to MySQL: " . mysqli_connect_error();
														}

														$sql="SELECT * FROM fw WHERE fw_status ='APPROVED' ORDER BY fw_name ASC";

														$result=mysqli_query($con,$sql);

														$i=0;
														// Associative array
														if(mysqli_num_rows($result)>0)
														{
															while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
															{
																$i++;
																echo "<tr>";
																echo	"<td>". $i ."</td>";
																echo 	"<td>".$row["fw_name"]."</td>";
																echo 	"<td>". $row["fw_nation"] ."</td>";
																echo 	"<td>". $row["fw_phone"] ."</td>";
																echo 	"<td>". $row["fw_phone2"] ."</td>";
																echo 	"<td>". $row["fw_phone3"] ."</td>";
																echo 	"<td>". $row["fw_gender"] ."</td>";
																echo 	"<td>". $row["fw_address"] ."</td>";
																echo 	"<td>". $row["fw_intake"] ."</td>";
																echo 	"<td>". $row["fw_register"] ."</td>";
																echo 	"<td>". $row["fw_remarks"] ."</td>";
																echo 	"<td>". $row["emp_assigned"] ."</td>";
																echo 	"<td>
                                                                <a href='empViewFW.php?fw_id=" . $row["fw_id"] . "' ><button type='button' class='btn btn-warning'>View Details</button></a>  
																<br><br>
																		</td>";
																echo "</tr>";
															}
														}
														else{
															echo "<tr>";
															echo	"<td colspan='5'>No Result</td>";
															echo "</tr>";
														}
														mysqli_close($con);
														?>
												</tbody>
											</table>
										</div>
									</div>

								</div>
								<!-- <a href="empDashboard.php" onclick="history.go(-1);" type="button" class="btn btn-primary">Back</a>  -->
							</div>
						</div>
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