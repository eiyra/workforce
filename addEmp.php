<form name="form1" method="post" action="addEmp.php">

<?php
include ('config.php');

$emp_ic = $_POST["emp_ic"];
$emp_name = $_POST["emp_name"];
$emp_password = "Abcd1234";
$emp_email = strtolower($_POST["emp_email"]);
$emp_address = $_POST["emp_address"];
$emp_phoneNo = $_POST["emp_phoneNo"];
$emp_gender = $_POST["emp_gender"];
$emp_dept = $_POST["emp_dept"];



$sql = "SELECT * FROM makeupartist WHERE mua_ic='".$mua_ic."' ";
$query = mysqli_query($con, $sql);
$result = mysqli_fetch_array($query,MYSQLI_ASSOC);

if($result)
{
	echo "<script>alert('User already exist!');";
  echo "window.location.href = 'adminViewMua.php';</script>";
	// header ("location:../../adminViewMua.php?exist_error=".$mua_ic."");
}
else
{
	$insert = mysqli_query($con,"INSERT INTO makeupartist (mua_ic, mua_name, mua_password, mua_email, mua_address, latitude, longitude, mua_phone_no, mua_gender,mua_charge)
	 VALUES(
	'". $mua_ic ."',
	'". $mua_name ."',
	'". $mua_password ."',
	'". $mua_email ."',
	'". $mua_address ."',
	'". $latitude ."',
	'". $longitude ."',
	'". $mua_phone_no ."',
	'". $mua_gender ."',
  '". $mua_charge ."') ") or (mysqli_connect_error());

		if($insert)
		{
			echo "<script>alert('Successfully inserted!');";
		  echo "window.location.href = 'adminViewEmp.php';</script>";
		}
		else
		{
			echo "<script>alert('Error inserting data!');";
			echo "window.location.href = 'adminViewEmp.php';</script>";
		}
}
mysqli_close($con);
?>

</form>
