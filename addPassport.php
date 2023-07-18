<form name="form1" method="post" action="addPassport.php">


<?php
include ('config.php');

	if (isset($_POST['submit'])) {

		$fw_id = $_POST['fw_id'];
		// $fw_name = $_POST['fw_name'];
		$passNo = $_POST['passNo'];
		$passIssuedDate = $_POST['passIssuedDate'];
		$passExpDate = $_POST['passExpDate'];
		$passTakenDate = $_POST['passTakenDate'];
		$passNote = $_POST['passNote'];
		$passEmpAssign = $_POST['passEmpAssign'];
		

		if (isset($_FILES['passFile']['name']))
		{
		$file_name = $_FILES['passFile']['name'];
		$file_tmp = $_FILES['passFile']['tmp_name'];

		
		move_uploaded_file($file_tmp,"./doc/passport/".$file_name);
		
		$insertquery =
		"INSERT INTO passport(fw_id,passNo,passIssuedDate,passExpDate,passTakenDate,passFile,passNote,passEmpAssign)
		VALUES ('$fw_id','$passNo','$passIssuedDate','$passExpDate','$passTakenDate','$file_name','$passNote','$passEmpAssign')";
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
