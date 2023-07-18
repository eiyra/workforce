<form name="formaddAdmin" method="post" action="addAdmin.php">

<?php
include ('config.php');

$admin_ic = $_POST["admin_ic"];
$admin_name = $_POST["admin_name"];
$admin_password = "Abcd1234";
$admin_email = strtolower($_POST["admin_email"]);
$admin_address = $_POST["admin_address"];
$admin_gender = $_POST["admin_gender"];
$admin_phone_no = $_POST["admin_phone_no"];



$sql = "SELECT * FROM admin WHERE admin_ic='".$admin_ic."' ";
$query = mysqli_query($con, $sql);
$result = mysqli_fetch_array($query,MYSQLI_ASSOC);

if($result)
{
	echo "<script>alert('Sorry, user already existed');";
  echo "window.location.href = 'adminViewAdmin.php';</script>";
	// header ("location:../../adminViewMua.php?exist_error=".$mua_ic."");
}
else
{
	$insert = mysqli_query($con,"INSERT INTO admin (admin_ic, admin_name, admin_password, admin_email, admin_address, admin_gender, admin_phone_no)
	 VALUES(
	'". $admin_ic ."',
	'". $admin_name ."',
	'". $admin_password ."',
	'". $admin_email ."',
	'". $admin_address ."',
	'". $admin_gender ."',
	'". $admin_phone_no ."') ") or (mysqli_connect_error());

		if($insert)
		{
			echo "<script>alert('Successfully inserted!');";
		  echo "window.location.href = 'adminViewAdmin.php';</script>";
			// header ("location:../../adminViewMua.php?success=".$mua_name."");
		}
		else
		{
			echo "<script>alert('Error inserting data!');";
			echo "window.location.href = 'adminViewAdmin.php';</script>";
			// header ("location:../../adminViewMua.php?error_insert=".$mua_name."");

		}
}
mysqli_close($con);
?>

</form>
