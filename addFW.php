<form name="form1" method="post" action="addFW.php">

<?php
include ('config.php');

$fw_name = $_POST["fw_name"];
$fw_nation = $_POST["fw_nation"];
$fw_phone = $_POST["fw_phone"];
$fw_phone2 = $_POST["fw_phone2"];
$fw_phone3 = $_POST["fw_phone3"];
$fw_address = $_POST["fw_address"];
$fw_gender = $_POST["fw_gender"];
$fw_intake = $_POST["fw_intake"];
$fw_register = $_POST["fw_register"];
$fw_status = "PENDING";
$fw_remarks = $_POST["fw_remarks"];
$emp_name = $_POST["emp_name"];


$sql = "SELECT * FROM fw";
$query = mysqli_query($con, $sql);
$result = mysqli_fetch_array($query,MYSQLI_ASSOC);

	
{
	$insert = mysqli_query($con,"INSERT INTO fw (fw_name, fw_nation, fw_phone, fw_phone2, fw_phone3, fw_address, fw_gender, fw_intake, fw_register, fw_status, fw_remarks, emp_assigned)
	 VALUES(
	
	'". $fw_name ."',
	'". $fw_nation ."',
	'". $fw_phone ."',
	'". $fw_phone2 ."',
	'". $fw_phone3 ."',
	'". $fw_address ."',
	'". $fw_gender ."',
	'". $fw_intake ."',
	'". $fw_register ."',
	'". $fw_status ."',
	'". $fw_remarks ."',
	'". $emp_name ."'
	) ") or (mysqli_connect_error());
  

		if($insert)
		{
			echo "<script>alert('Successfully added!');";
			echo "window.location.href = 'empDashboard.php';</script>";
		}
		else
		{
			echo "<script>alert('Error inserting data!');";
			echo "window.location.href = 'empDashboard.php';</script>";
		}
}
mysqli_close($con);
?>

</form>
