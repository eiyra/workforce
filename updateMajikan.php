<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fw_id = $_POST["fw_id"];
	$majikanNo = $_POST["majikanNo"];
    $majikanName = $_POST["majikanName"];
    $majikanPhone = $_POST["majikanPhone"];
    $majikanPhone2 = $_POST["majikanPhone2"];
    $majikanEmail = $_POST["majikanEmail"];
    $majikanEmail2 = $_POST["majikanEmail2"];
	$majikanNote = $_POST["majikanNote"];
    $majikanEmpAssign = $_POST["majikanEmpAssign"];

    // Use prepared statement
    $sql = "UPDATE majikan SET
            majikanName = ?,
            majikanPhone = ?,
            majikanPhone2 = ?,
            majikanEmail = ?,
            majikanEmail2 = ?,
			majikanNote = ?,
            majikanEmpAssign = ?
            WHERE majikanNo = ?";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssss",
        $majikanName, $majikanPhone, $majikanPhone2,
        $majikanEmail, $majikanEmail2, $majikanNote, $majikanEmpAssign, $majikanNo
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
