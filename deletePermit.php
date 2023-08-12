<?php
include('config.php');

if (isset($_GET['permitNo'])) {
    $permitNo = $_GET['permitNo'];

    // Get the document path from the database
    $select_query = "SELECT permitFile FROM permit WHERE permitNo = ?";
    $stmt = mysqli_prepare($con, $select_query);
    mysqli_stmt_bind_param($stmt, "s", $permitNo); // Use "s" for string parameter
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $permitFile);

    if (mysqli_stmt_fetch($stmt)) {
        // Free the result set
        mysqli_stmt_free_result($stmt);

        // Delete the document file from the directory
        $file_path = "./doc/permit/" . basename($permitFile);
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Delete the data from the database
        $delete_query = "DELETE FROM permit WHERE permitNo = ?";
        $stmt2 = mysqli_prepare($con, $delete_query);
        mysqli_stmt_bind_param($stmt2, "s", $permitNo); // Use "s" for string parameter
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);

        echo "<script>window.alert('Permit and document have been deleted successfully!');window.location.href='empFWList.php';</script>";
    } else {
        mysqli_stmt_free_result($stmt); // Free the result set in case of no record found

        echo "<script>window.alert('Permit not found!');window.location.href='empFWList.php';</script>";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "<script>window.alert('Invalid request!');window.location.href='empFWList.php';</script>";
}
?>
