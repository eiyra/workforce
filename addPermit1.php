<form name="form1" method="post" action="addPermit.php">

<?php
include('config.php');

if (isset($_POST['submit'])) {
	$fw_id = $_POST['fw_id'];
	$permitNo = $_POST['permitNo'];
	$permitIssuedDate = $_POST['permitIssuedDate'];
	$permitExpDate = $_POST['permitExpDate'];
	$permitTakenDate = $_POST['permitTakenDate'];
	$permitMethod = $_POST['permitMethod'];
	$permitEmpAssign = $_POST['permitEmpAssign'];
	$permitNote = $_POST['permitNote'];

	// Check if a file was uploaded
	if (isset($_FILES['permitFile']['name']) && $_FILES['permitFile']['name'] !== '') {
		$file_name = $_FILES['permitFile']['name'];
		$file_tmp = $_FILES['permitFile']['tmp_name'];
		$file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

		// Check if the uploaded file is a PDF
		if ($file_type !== 'pdf') {
			echo "<script>window.alert('Failed! File must be uploaded in PDF format!');window.location.href='empAddPermit.php?permitNo=" . $permitNo . "';</script>";
			exit();
		}

		$target_directory = "./doc/permit/";
		$target_file = $target_directory . basename($file_name);

		// Check if the file already exists
		if (file_exists($target_file)) {
			echo "<script>window.alert('A file with that name already existed!');window.location.href='empAddPermit.php?permitNo=" . $permitNo . "';</script>";
			exit();
		}

		// Move the uploaded file to the desired directory
		if (move_uploaded_file($file_tmp, $target_file)) {
			$insertquery = "INSERT INTO permit(fw_id,permitNo,permitIssuedDate,permitExpDate,permitTakenDate,permitFile,permitMethod,permitEmpAssign,permitNote)
                            VALUES ('$fw_id','$permitNo','$permitIssuedDate','$permitExpDate','$permitTakenDate','$permitFile','$permitMethod','$permitEmpAssign', '$permitNote')";

			// Use prepared statement to prevent SQL injection
			$stmt = mysqli_prepare($con, $insertquery);
			if (!$stmt) {
				echo "Error: " . mysqli_error($con);
				exit();
			}

			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);

			echo "<script>window.alert('Successfully added!');window.location.href='empFWList.php?permitNo=" . $permitNo . "';</script>";
		} else {
			echo "<script>window.alert('Failed to upload the file!');window.location.href='empAddPermit.php?permitNo=" . $permitNo . "';</script>";
			// exit();
		}
	} else {
		echo "<script>window.alert('You must upload a PDF file!');window.location.href='empAddPermit.php?permitNo=" . $permitNo . "';</script>";
		// exit();
	}
}
?>
