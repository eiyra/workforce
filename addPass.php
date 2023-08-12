<?php
include('config.php');

if (isset($_POST['submit'])) {
    $fw_id = $_POST['fw_id'];
    $passNo = $_POST['passNo'];
    $passIssuedDate = $_POST['passIssuedDate'];
    $passExpDate = $_POST['passExpDate'];
    $passNote = $_POST['passNote'];
    $passEmpAssign = $_POST['passEmpAssign'];

    // Check if a file was uploaded
    if (isset($_FILES['passFile']['name']) && $_FILES['passFile']['name'] !== '') {
        $file_name = $_FILES['passFile']['name'];
        $file_tmp = $_FILES['passFile']['tmp_name'];
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Check if the uploaded file is a PDF
        if ($file_type !== 'pdf') {
            echo "<script>window.alert('Failed! File must be uploaded in PDF format!'); window.location.href='empViewFW.php?fw_id=" . $fw_id . "';</script>";
            exit();
        } else {
            $target_directory = "./doc/passport/";
            $target_file = $target_directory . basename($file_name);

            // Check if the file already exists
            if (file_exists($target_file)) {
                echo "<script>window.alert('A file with that name already exists!'); window.location.href='empViewFW.php?fw_id=" . $fw_id . "';</script>";
				exit();
            } else {
                // Check if the passport number already exists in the database
                $check_query = "SELECT passNo FROM passport WHERE passNo = ?";
                $check_stmt = mysqli_prepare($con, $check_query);
                mysqli_stmt_bind_param($check_stmt, "s", $passNo);
                mysqli_stmt_execute($check_stmt);
                mysqli_stmt_store_result($check_stmt);
                
                if (mysqli_stmt_num_rows($check_stmt) > 0) {
                    echo "<script>window.alert('Passport number already exists in the database!'); window.location.href='empViewFW.php?fw_id=" . $fw_id . "';</script>";
					exit();
                } else {
                    // Move the uploaded file to the desired directory
                    if (move_uploaded_file($file_tmp, $target_file)) {
                        // Use prepared statement to prevent SQL injection
                        $insertquery = "INSERT INTO passport(fw_id, passNo, passIssuedDate, passExpDate, passFile, passNote, passEmpAssign)
                                        VALUES (?, ?, ?, ?, ?, ?, ?)";

                        $stmt = mysqli_prepare($con, $insertquery);
                        if ($stmt) {
                            // Bind the parameters to the prepared statement
                            mysqli_stmt_bind_param($stmt, "sssssss", $fw_id, $passNo, $passIssuedDate, $passExpDate, $file_name, $passNote, $passEmpAssign);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_close($stmt);

                            echo "<script>window.alert('Successfully added!'); window.location.href='empViewFW.php?fw_id=" . $fw_id . "';</script>";
                        } else {
                            echo "<script>window.alert('Error: " . mysqli_error($con) . "'); window.location.href='empViewFW.php?fw_id=" . $fw_id . "';</script>";
                        }
                    } else {
                        echo "<script>window.alert('Failed to upload the file!'); window.location.href='empViewFW.php?fw_id=" . $fw_id . "';</script>";
                    }
                }
                
                mysqli_stmt_close($check_stmt);
            }
        }
    } else {
        echo "<script>window.alert('You must upload a PDF file!'); window.location.href='empViewFW.php?fw_id=" . $fw_id . "';</script>";
    }
}
?>
