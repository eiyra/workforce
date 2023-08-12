<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fw_id = $_POST["fw_id"];
    $medicalNo = $_POST["medicalNo"];
    $medicalDate = $_POST["medicalDate"];
    $immDate = $_POST["immDate"];
    $medicalStatus = $_POST["medicalStatus"];
    $medicNote = $_POST["medicNote"];
    $medicEmpAssign = $_POST["medicEmpAssign"];

    // Use prepared statement
    $sql = "UPDATE medical SET
            medicalDate = ?,
            immDate = ?,
            medicalStatus = ?,
            medicNote = ?,
            medicEmpAssign = ?
            WHERE medicalNo = ?";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss",
        $medicalDate, $immDate, $medicalStatus,
        $medicNote, $medicEmpAssign, $medicalNo
    );

    $result = mysqli_stmt_execute($stmt);

    $message = $result ? 'Successfully updated!' : 'Error updating data!';
    echo '<script type="text/javascript">';
    echo "alert('$message');";
    echo "window.location.href='empViewFW.php?fw_id=$fw_id';</script>";
    echo '</script>';

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
