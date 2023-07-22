<form name="form1" method="post" action="addFinger.php">

<?php
include ('config.php');

$fw_id = $_POST["fw_id"];
$fingerNo = $_POST["fingerNo"];
$fingerDate = $_POST["fingerDate"];
$fingerBatch = $_POST["fingerBatch"];
$fingerStatus = $_POST["fingerStatus"];
$fingerNote = $_POST["fingerNote"];
$fingerEmpAssign = $_POST["fingerEmpAssign"];


// $sql = "SELECT * FROM fw";
// $query = mysqli_query($con, $sql);
// $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
//cool

	
{
	$insert = mysqli_query($con,"INSERT INTO fingerprint (fw_id, fingerNo, fingerDate, fingerBatch, fingerStatus, fingerNote, fingerEmpAssign)
	 VALUES(
	
	'". $fw_id ."',
	'". $fingerNo ."',
	'". $fingerDate ."',
	'". $fingerBatch ."',
	'". $fingerStatus ."',
	'". $fingerNote ."',
	'". $fingerEmpAssign ."'
	) ") or (mysqli_connect_error());
  

		if($insert)
		{
			echo "<script>alert('Successfully added!');";
			echo "window.location.href='empViewFW.php?fw_id=" . $fw_id . "';</script>";
		}
		else
		{
			echo "<script>alert('Error inserting data!');";
			echo "window.location.href = 'empViewFW.php?fw_id=" . $fw_id . "';</script>";
		}
}
mysqli_close($con);
?>

</form>
