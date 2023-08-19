<?php 
require_once("config.php"); 
	session_start();
	
	if($_SESSION['admin_ic'] == "")
	{
    echo "<script>alert('Please Login!');";
    echo "window.location.href = 'index.php';</script>";
		exit();
	}


	$strSQL = "SELECT * FROM admin WHERE admin_ic = '".$_SESSION['admin_ic']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	// Check if the queries were successful before fetching data
if ($objQuery && mysqli_num_rows($objQuery) > 0) {
    $row = mysqli_fetch_array($objQuery);
}

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
							<span>List of Employee</span>
						</h2>
					</div>
					
					<div class="grid-system">
						<div class="horz-grid">
							<div class="grid-hor">
								<?php
									if ( (isset($_GET['exist_error'])) )
									{
										$admin_ic = $_GET['exist_error'];

										echo "<div class='alert alert-danger'>";
										echo	"<strong>Warning!</strong> Employee IC is already existed!";
										echo "</div>";
									}
								?>
								<?php
									if ( (isset($_GET['success'])) )
									{
										$admin_ic = $_GET['success'];

										echo "<div class='alert alert-success'>";
										echo	"<strong>Succesfully!</strong> inserted.";
										echo "</div>";
									}
								?>
								<?php
									if ( (isset($_GET['error_insert'])) )
									{
										$admin_ic = $_GET['error_insert'];

										echo "<div class='alert alert-danger'>";
										echo	"<strong>Warning!</strong> Error inserting data!";
										echo "</div>";
									}
								?>
								<?php
									if ( (isset($_GET['error_delete'])) )
									{
										$error_delete = $_GET['error_delete'];

										echo "<div class='alert alert-danger'>";
										echo	"<strong>Warning!</strong> Data was not successfully deleted.";
										echo "</div>";
									}
								?>
								<?php
									if ( (isset($_GET['success_delete'])) )
									{
										$success_delete = $_GET['success_delete'];

										echo "<div class='alert alert-success'>";
										echo	"<strong>Succesfully!</strong> deleted.";
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
								<a href="adminInsertEmp.php"><button type="button" class="btn btn-primary">+</button></a>
								<br><br>
								<div class='panel panel-primary'>
									<div class='panel-body'>
										<div class="table-responsive">
											<table class="table table-bordered table-hover" id="example">
												<thead>
													<tr>
														<th> No  </th>
														<th> Name </th>
														<th> Email </th>
														<th> Address </th>
														<th> Phone Number </th>
														<th> Gender </th>
														<th> Department </th>
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

														$sql="SELECT * FROM employee ORDER BY emp_name ASC";

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
																echo 	"<td>".$row["emp_name"]."</td>";
																echo 	"<td>". $row["emp_email"] ."</td>";
																echo 	"<td>". $row["emp_address"] ."</td>";
																echo 	"<td>". $row["emp_phoneNo"] ."</td>";
																echo 	"<td>". $row["emp_gender"] ."</td>";
																echo 	"<td>". $row["emp_dept"] ."</td>";
																echo 	"<td>
                                                                <a href='adminUpdateEmp.php?emp_ic=" . $row["emp_ic"] . "' ><button type='button' class='btn btn-warning'>Update</button></a>  
																<br><br>
                                                                <a href='deleteEmp.php?emp_ic=" . $row["emp_ic"] . "' ><button type='button' onclick='return checkDelete()' class='btn btn-danger pull-right'>Delete</button></a>
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
								<a href="adminDashboard.php" onclick="history.go(-1);" type="button" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
</div>
</div>

<?php
include "adminFooter.php";                
?>
