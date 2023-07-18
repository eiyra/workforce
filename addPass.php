<?php
include('config.php');

if (isset($_POST['submit'])) {
	$fw_id = $_POST['fw_id'];
	// $fw_name = $_POST['fw_name'];
	$passNo = $_POST['passNo'];
	$passIssuedDate = $_POST['passIssuedDate'];
	$passExpDate = $_POST['passExpDate'];
	$passTakenDate = $_POST['passTakenDate'];
	$passNote = $_POST['passNote'];
	$passEmpAssign = $_POST['passEmpAssign'];

	// Check if a file was uploaded
	if (isset($_FILES['passFile']['name']) && $_FILES['passFile']['name'] !== '') {
		$file_name = $_FILES['passFile']['name'];
		$file_tmp = $_FILES['passFile']['tmp_name'];
		$file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

		// Check if the uploaded file is a PDF
		if ($file_type !== 'pdf') {
			echo "<script>window.alert('Failed! File must be uploaded in PDF format!');window.location.href='empFWList.php'</script>";
			exit();
		}

		$target_directory = "./doc/passport/";
		$target_file = $target_directory . basename($file_name);

		// Check if the file already exists
		if (file_exists($target_file)) {
			echo "<script>window.alert('A file with that name already exists!');</script>";
			exit();
		}

		// Move the uploaded file to the desired directory
		if (move_uploaded_file($file_tmp, $target_file)) {
			$insertquery = "INSERT INTO passport(fw_id,passNo,passIssuedDate,passExpDate,passTakenDate,passFile,passNote,passEmpAssign)
                            VALUES ('$fw_id','$passNo','$passIssuedDate','$passExpDate','$passTakenDate','$file_name','$passNote','$passEmpAssign')";

			// Use prepared statement to prevent SQL injection
			$stmt = mysqli_prepare($con, $insertquery);
			if (!$stmt) {
				echo "Error: " . mysqli_error($con);
				exit();
			}

			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);

			echo "<script>window.alert('Successfully added!')</script>";
		} else {
			echo "<script>window.alert('Failed to upload the file!')</script>";
			// exit();
		}
	} else {
		echo "<script>window.alert('You must upload a PDF file!')</script>";
		// exit();
	}
}
?>