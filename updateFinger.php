<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fw_id = $_POST["fw_id"];
	$fingerNo = $_POST["fingerNo"];
    $fingerDate = $_POST["fingerDate"];
    $fingerBatch = $_POST["fingerBatch"];
    $fingerStatus = $_POST["fingerStatus"];
    $fingerNote = $_POST["fingerNote"];
    $fingerEmpAssign = $_POST["fingerEmpAssign"];

    // Use prepared statement
    $sql = "UPDATE fingerprint SET
            fingerDate = ?,
            fingerBatch = ?,
            fingerStatus = ?,
            fingerNote = ?,
            fingerEmpAssign = ?
            WHERE fingerNo = ?";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss",
        $fingerDate, $fingerBatch, $fingerStatus,
        $fingerNote, $fingerEmpAssign, $fingerNo
    );

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Successfully updated!");';
        echo "window.location.href='empViewFW.php?fw_id=" . $fw_id . "';</script>";
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Error updating data!");';
        echo "window.location.href='empViewFW.php?fw_id=" . $fw_id . "';</script>";
        echo '</script>';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
