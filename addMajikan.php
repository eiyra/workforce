<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fw_id = $_POST["fw_id"];
    $majikanName = $_POST["majikanName"];
    $majikanPhone = $_POST["majikanPhone"];
    $majikanPhone2 = $_POST["majikanPhone2"];
    $majikanEmail = $_POST["majikanEmail"];
    $majikanEmail2 = $_POST["majikanEmail2"];
    $majikanNote = $_POST["majikanNote"];
    $majikanEmpAssign = $_POST["majikanEmpAssign"];

    $insertQuery = "INSERT INTO majikan (fw_id, majikanName, majikanPhone, majikanPhone2, majikanEmail, majikanEmail2, majikanNote, majikanEmpAssign)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $insertQuery);
    mysqli_stmt_bind_param(
        $stmt,
        "ssssssss",
        $fw_id,
        $majikanName,
        $majikanPhone,
        $majikanPhone2,
        $majikanEmail,
        $majikanEmail2,
        $majikanNote,
        $majikanEmpAssign
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Successfully added!');";
        echo "window.location.href='empViewFW.php?fw_id=" . $fw_id . "';</script>";
    } else {
        echo "<script>alert('Error inserting data!');";
        echo "window.location.href='empViewFW.php?fw_id=" . $fw_id . "';</script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
