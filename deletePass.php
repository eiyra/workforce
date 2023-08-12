<?php
include('config.php');

if (isset($_GET['passNo'])) {
    $passNo = $_GET['passNo'];

    // Get the document path from the database
    $select_query = "SELECT passFile FROM passport WHERE passNo = ?";
    $stmt = mysqli_prepare($con, $select_query);
    mysqli_stmt_bind_param($stmt, "s", $passNo); // Use "s" for string parameter
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $passFile);

    if (mysqli_stmt_fetch($stmt)) {
        // Free the result set
        mysqli_stmt_free_result($stmt);

        // Delete the document file from the directory
        $file_path = "./doc/passport/" . basename($passFile);
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Delete the data from the database
        $delete_query = "DELETE FROM passport WHERE passNo = ?";
        $stmt2 = mysqli_prepare($con, $delete_query);
        mysqli_stmt_bind_param($stmt2, "s", $passNo); // Use "s" for string parameter
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);

        echo "<script>window.alert('Passport and document have been deleted successfully!');window.location.href='empFWList.php';</script>";
    } else {
        mysqli_stmt_free_result($stmt); // Free the result set in case of no record found

        echo "<script>window.alert('Passport not found!');window.location.href='empFWList.php';</script>";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "<script>window.alert('Invalid request!');window.location.href='empFWList.php';</script>";
}
?>
