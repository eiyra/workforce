<form name="form1" method="post" action="addMedic.php">

<?php
include ('config.php');

$fw_id = $_POST["fw_id"];
$medicalNo = $_POST["medicalNo"];
$medicalDate = $_POST["medicalDate"];
$immDate = $_POST["immDate"];
$medicalStatus = $_POST["medicalStatus"];
$medicNote = $_POST["medicNote"];
$medicEmpAssign = $_POST["medicEmpAssign"];


// $sql = "SELECT * FROM fw";
// $query = mysqli_query($con, $sql);
// $result = mysqli_fetch_array($query,MYSQLI_ASSOC);

	
{
	$insert = mysqli_query($con,"INSERT INTO medical (fw_id, medicalNo, medicalDate, immDate, medicalStatus, medicNote, medicEmpAssign)
	 VALUES(
	
	'". $fw_id ."',
	'". $medicalNo ."',
	'". $medicalDate ."',
	'". $immDate ."',
	'". $medicalStatus ."',
	'". $medicNote ."',
	'". $medicEmpAssign ."'
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
