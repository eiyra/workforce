<?php require_once("config.php"); ?>
<?php
	session_start();
	if($_SESSION['customer_ic'] == "")
	{
    echo "<script>alert('Please Login!');";
    echo "window.location.href = 'index.php';</script>";
		exit();
	}


	$strSQL = "SELECT * FROM customer WHERE customer_ic = '".$_SESSION['customer_ic']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);

?>


<form name="formAppointment" method="post" action="makeAppointment.php">

<?php

include 'config.php';

$sessions = $_SESSION['customer_ic'];
$app_date = $_POST['bookingDate'];
$app_session = $_POST['session'];
$total = $_POST['total_charge'];
$mua_ic = $_POST['mua_ic'];



		$sql = "SELECT * FROM appointment where customer_ic = '$sessions' and mua_ic = '$mua_ic' and app_status='PENDING' ";
		$result=mysqli_query($con,$sql);


		if (mysqli_num_rows($result) > 0)
		{
			mysqli_query($con,"UPDATE appointment set app_date = '$app_date' , app_session = '$app_session' ,
				total_charge = '$total'  where customer_ic = '$sessions' and mua_ic = '$mua_ic' ");
			echo "<script>alert('Appointment successfully updated!');";
		  echo "window.location.href = 'customerCheckApp.php';</script>";
		}
		else
		{
			mysqli_query($con,"INSERT INTO appointment values ('' , '$app_date', 'PENDING' , '$app_session' , '$total' , '$sessions' , '$mua_ic')");
			echo "<script>alert('Successfully booked appointment!');";
		  echo "window.location.href = 'customerCheckApp.php';</script>";
		}


?>
