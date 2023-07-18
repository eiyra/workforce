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
							<span>Dashboard</span>
						</h2>
					</div>

          <div class="content-top">
			<div class="clearfix"> </div>
		  </div>

					<div class="content-mid">

						<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>List of Pending Foreign Workers</b></div>
						<br>
								<div class='panel panel-primary'>
									<div class='panel-body'>
										<div class="table-responsive">
											<table class="table table-bordered table-hover" id="example" style="width:100%">
												<thead>
													<tr>
														<th> No </th>
														<th> Name </th>
														<th> Nationality </th>
														<th> Phone Number (1)</th>
														<th> Phone Number (2)</th>
														<th> Phone Number (3)</th>
														<th> Gender </th>
														<th> Intake Type </th>		
														<th> Agency Registered </th>
														<th> Note </th>
														<th> Employee Assigned </th>
														<th> Approval Status </th>
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

														$sql="SELECT * FROM fw WHERE fw_status ='PENDING' ORDER BY fw_name ASC";

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
																echo 	"<td>". $row["fw_intake"] ."</td>";
																echo 	"<td>". $row["fw_register"] ."</td>";
																echo 	"<td>". $row["fw_remarks"] ."</td>";
																echo 	"<td>". $row["emp_assigned"] ."</td>";
																echo 	"<td>". $row["fw_status"] ."</td>";
																// echo 	"<td>
                                                                // <a href='adminUpdateEmp.php?emp_ic=" . $row["emp_ic"] . "' ><button type='button' class='btn btn-warning'>Update</button></a>  
																// <br><br>
                                                                // <a href='deleteEmp.php?emp_ic=" . $row["emp_ic"] . "' ><button type='button' onclick='return checkDelete()' class='btn btn-danger pull-right'>Delete</button></a>
                                                                		// </td>";
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

						


								<div class="clearfix"> </div>
						</div>

						<div class="content-bottom">
							<div class="col-md-6 post-top">


							</div>
						</div>
						<div class="clearfix"> </div>
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