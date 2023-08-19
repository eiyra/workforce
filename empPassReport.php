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
							<a href="empReport.php">Report</a>
							<i class="fa fa-angle-right"></i>
							<a href="empPassReport.php">Passport Report</a>
						</h2>
					</div>
					
					<br>
					
<div class="panel panel-primary">
    <div class="panel-body">
        <div class="table-responsive">
		
            <form class="form-inline" method="GET">
				<div class="form-group">
					<i class="fa fa-search nav_icon "></i>
					<select class="form-control" name="status" required>
						<option value=""></option>
						<option value="18MONTHS" <?php if (isset($_GET['status']) && $_GET['status'] === '18MONTHS') echo 'selected'; ?>>Passport Expires Within 18 Months</option>
						<!-- Add more options here -->
					</select>
					&nbsp;&nbsp;
					<button type="submit" name="searchStatus" id="searchStatus" class="btn btn-primary btn-sm">Submit</button>
				</div>
			</form>


            <br><br>

            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Nationality</th>
                                    <th>Year</th>
                                    <th>Phone Number (1)</th>
                                    <th>Phone Number (2)</th>
                                    <th>Phone Number (3)</th>
                                    <th>Intake Type</th>
                                    <th>Calling Visa Date</th>
                                    <th>Calling Visa Batch</th>
                                    <th>Agency Registered</th>
                                    <th>Passport Number</th>
									<th>Passport Issued Date</th>
                                    <th>Passport Expiry Date</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
							
    <tbody>
							
    <?php
    include 'config.php'; // Include your database connection

    // Fetch data based on filter or default query
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        if ($status == '18MONTHS') {
            $query = "SELECT * FROM passport NATURAL JOIN fw WHERE passExpDate BETWEEN date_sub(now(), interval 0 day) AND date_add(now(), interval 18 month) ORDER BY fw_name ASC";
        }
        // Add more conditions for other options if needed
    } else {
        $query = "SELECT * FROM passport NATURAL JOIN fw ORDER BY fw_name ASC";
    }
    
    $result = mysqli_query($con, $query) or die(mysqli_error());
    
    if (mysqli_num_rows($result) > 0) 
	{
        $i = 1; // Initialize counter
        while ($row = mysqli_fetch_assoc($result)) 
		{
            $fw_name = $row["fw_name"];
            $fw_nation = $row["fw_nation"];
            $fw_year = $row["fw_year"];
            $fw_phone = $row["fw_phone"];
            $fw_phone2 = $row["fw_phone2"];
            $fw_phone3 = $row["fw_phone3"];
            $fw_intake = $row["fw_intake"];
            $cvDateInput = $row["cvDateInput"];
            $cvBatchInput = $row["cvBatchInput"];
            $fw_register = $row["fw_register"];
            $passNo = $row["passNo"];
			$passIssuedDate = $row["passIssuedDate"];
            $passExpDate = $row["passExpDate"];
            $passNote = $row["passNote"];

            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $fw_name . "</td>";
            echo "<td>" . $fw_nation . "</td>";
            echo "<td>" . $fw_year . "</td>";
            echo "<td>" . $fw_phone . "</td>";
            echo "<td>" . $fw_phone2 . "</td>";
            echo "<td>" . $fw_phone3 . "</td>";
            echo "<td>" . $fw_intake . "</td>";
            echo "<td>" . $cvDateInput . "</td>";
            echo "<td>" . $cvBatchInput . "</td>";
            echo "<td>" . $fw_register . "</td>";
            echo "<td>" . $passNo . "</td>";
			echo "<td>" . $passIssuedDate . "</td>";
            echo "<td>" . $passExpDate . "</td>";
            echo "<td>" . $passNote . "</td>";
            echo "</tr>";
            $i++;
        }
    } 

    ?>
    </tbody>
                        </table>
                    </div>
                </div>
            </div>
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