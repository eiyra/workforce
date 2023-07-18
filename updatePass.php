<?php
include('config.php');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['submit'])) {
    $fw_id = $_POST['fw_id'];
    $fw_name = $_POST['fw_name'];
    $fw_nation = $_POST['fw_nation'];
    $passNo = $_POST['passNo'];
    $passIssuedDate = $_POST['passIssuedDate'];
    $passExpDate = $_POST['passExpDate'];
    $passTakenDate = $_POST['passTakenDate'];
    $passNote = $_POST['passNote'];

    // Fetch the existing data from the database
    $selectSql = "SELECT passFile FROM passport WHERE passNo = ?";
    $selectStmt = mysqli_prepare($con, $selectSql);
    mysqli_stmt_bind_param($selectStmt, "s", $passNo);
    mysqli_stmt_execute($selectStmt);
    mysqli_stmt_bind_result($selectStmt, $passFile);

    if (mysqli_stmt_fetch($selectStmt)) {
        $filePath = $passFile;
    } else {
        $filePath = ""; // Set the default value if no data is found
    }

    mysqli_stmt_close($selectStmt);

    // File upload handling
    if (isset($_FILES['pdf_file']['name']) && $_FILES['pdf_file']['name'] !== '') {
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Check if the uploaded file is a PDF
        if ($file_type !== 'pdf') {
            echo "<script>window.alert('Failed! File must be uploaded in PDF format!'); window.location.href='empUpdatePass.php?passNo=" . $passNo . "';</script>";
            exit();
        }

        $target_directory = "./doc/passport/";
        $target_file = $target_directory . basename($file_name);

        // Check if the file already exists
        if (file_exists($target_file)) {
            echo "<script>window.alert('A file with that name already exists!'); window.location.href='empUpdatePass.php?passNo=" . $passNo . "';</script>";
            exit();
        }

        // Move the uploaded file to the desired directory
        if (!move_uploaded_file($file_tmp, $target_file)) {
            echo "<script>window.alert('Failed to upload the file!'); window.location.href='empUpdatePass.php?passNo=" . $passNo . "';</script>";
            exit();
        }
    } else {
        // File was not uploaded
        $file_name = ""; // Set the filename to an empty string if no file was uploaded
        $target_file = $filePath; // Use the existing file path if no new file is uploaded
    }

    // Prepare the SQL query to insert or update the data
    $sql = "INSERT INTO passport(fw_id,passNo,passIssuedDate,passExpDate,passTakenDate,passFile,passNote)
            VALUES (?,?,?,?,?,?,?)
            ON DUPLICATE KEY UPDATE
            passNo=VALUES(passNo),
            passIssuedDate=VALUES(passIssuedDate),
            passExpDate=VALUES(passExpDate),
            passTakenDate=VALUES(passTakenDate),
            passFile=VALUES(passFile),
            passNote=VALUES(passNote)";

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) {
        echo "Error: " . mysqli_error($con);
        exit();
    }

    // Bind parameters and execute the query
    mysqli_stmt_bind_param($stmt, "sssssss", $fw_id, $passNo, $passIssuedDate, $passExpDate, $passTakenDate, $target_file, $passNote);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "<script>window.alert('Successfully Updated!'); window.location.href='empUpdatePass.php?passNo=" . $passNo . "';</script>";

}

// Close the database connection
mysqli_close($con);
?>
