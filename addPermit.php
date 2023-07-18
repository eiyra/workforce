<form name="form1" method="post" action="addPermit.php">


<?php
include ('config.php');

	if (isset($_POST['submit'])) {

		$fw_id = $_POST['fw_id'];
		// $fw_name = $_POST['fw_name'];
		$permitNo = $_POST['permitNo'];
		$permitIssuedDate = $_POST['permitIssuedDate'];
		$permitExpDate = $_POST['permitExpDate'];
		$permitTakenDate = $_POST['permitTakenDate'];
		$permitStatus = $_POST['permitStatus'];
		$permitYear = $_POST['permitYear'];
		$permitEmpAssign = $_POST['permitEmpAssign'];
		$permitNote = $_POST['permitNote'];
		

		if (isset($_FILES['permitFile']['name']))
		{
		$file_name = $_FILES['permitFile']['name'];
		$file_tmp = $_FILES['permitFile']['tmp_name'];

		
		move_uploaded_file($file_tmp,"./doc/permit/".$file_name);
		
		$insertquery =
		"INSERT INTO permit(fw_id,permitNo,permitIssuedDate,permitExpDate,permitTakenDate,permitFile,permitStatus,permitYear,permitEmpAssign,permitNote)
		VALUES ('$fw_id','$permitNo','$permitIssuedDate','$permitExpDate','$permitTakenDate','$file_name','$permitStatus','$permitYear','$permitEmpAssign','$permitNote')";
		$iquery = mysqli_query($con, $insertquery);
		
			echo "<script>window.alert('Successfully added!');window.location.href='empFWList.php'</script>";
			exit;
			
		}
		
		if (file_exists($file_name))
		{
			echo "<script>window.alert('A file with that name already exists!');</script>";
			exit;
		}
			
		
		else
		{
		
			echo "<script>window.alert('Failed! File must be uploaded in PDF format!');window.location.href='empFWList.php'</script>";
			exit;
		
		}
		
	}
	
	
?>
