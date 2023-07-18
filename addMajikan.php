<form name="form1" method="post" action="addMajikan.php">

<?php
include ('config.php');

$fw_id = $_POST["fw_id"];
$majikanName = $_POST["majikanName"];
$majikanPhone = $_POST["majikanPhone"];
$majikanPhone2 = $_POST["majikanPhone2"];
$majikanEmail = $_POST["majikanEmail"];
$majikanEmail2 = $_POST["majikanEmail2"];
$majikanNote = $_POST["majikanNote"];
$majikanEmpAssign = $_POST["majikanEmpAssign"];

	
{
	$insert = mysqli_query($con,"INSERT INTO majikan (fw_id, majikanName, majikanPhone, majikanPhone2, majikanEmail, majikanEmail2, majikanNote,majikanEmpAssign)
	 VALUES(
	
	'". $fw_id ."',
	'". $majikanName ."',
	'". $majikanPhone ."',
	'". $majikanPhone2 ."',
	'". $majikanEmail ."',
	'". $majikanEmail2 ."',
	'". $majikanNote ."',
	'". $majikanEmpAssign ."'
	) ") or (mysqli_connect_error());
  

		if($insert)
		{
			echo "<script>alert('Successfully added!');";
			echo "window.location.href = 'empFWList.php';</script>";
		}
		else
		{
			echo "<script>alert('Error inserting data!');";
			echo "window.location.href = 'empFWList.php';</script>";
		}
}
mysqli_close($con);
?>

</form>
