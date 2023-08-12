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
			echo "<script>window.alert('Failed! File must be uploaded in PDF format!');window.location.href='empAddPermit.php?fw_id=" . $fw_id . "';</script>";
			exit();
		}

		$target_directory = "./doc/permit/";
		$target_file = $target_directory . basename($file_name);

		// Check if the file already exists
		if (file_exists($target_file)) {
			echo "<script>window.alert('A file with that name already exists!');window.location.href='empAddPermit.php?fw_id=" . $fw_id . "';</script>";
			exit();
		}

		// Move the uploaded file to the desired directory
		if (move_uploaded_file($file_tmp, $target_file)) {
			// Use prepared statement to prevent SQL injection
			$insertquery = "INSERT INTO permit (fw_id, permitNo, permitIssuedDate, permitExpDate, permitTakenDate, permitFile, permitMethod, permitEmpAssign, permitNote)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($con, $insertquery);
			if (!$stmt) {
				echo "Error: " . mysqli_error($con);
				exit();
			}

			mysqli_stmt_bind_param($stmt, "issssssss", $fw_id, $permitNo, $permitIssuedDate, $permitExpDate, $permitTakenDate, $target_file, $permitMethod, $permitEmpAssign, $permitNote);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);

			echo "<script>window.alert('Successfully added!');window.location.href='empViewFW.php?fw_id=" . $fw_id . "';</script>";
		} else {
			echo "<script>window.alert('Failed to upload the file!');window.location.href='empAddPermit.php?fw_id=" . $fw_id . "';</script>";
			exit();
		}
	} else {
		echo "<script>window.alert('You must upload a PDF file!');window.location.href='empAddPermit.php?fw_id=" . $fw_id . "';</script>";
		exit();
	}
}
?>


