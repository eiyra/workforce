<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fw_id = $_POST["fw_id"];
    $fwType = $_POST["fwType"];
    $serialOne = $_POST["serialOne"];
    $firstPayDate = $_POST["firstPayDate"];
    $firstPay = $_POST["firstPay"];
    $firstMethod = $_POST["firstMethod"];
    $payStatus = $_POST["payStatus"];
    $totalPay = $_POST["totalPay"];
    $payNote = $_POST["payNote"];
    $payEmpAssign = $_POST["payEmpAssign"];

    $insertQuery = "INSERT INTO payment (fw_id, fwType, serialOne, firstPayDate, firstPay, firstMethod, payStatus, totalPay, payNote, payEmpAssign)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $insertQuery);
    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssss",
        $fw_id,
        $fwType,
        $serialOne,
        $firstPayDate,
        $firstPay,
        $firstMethod,
        $payStatus,
        $totalPay,
        $payNote,
        $payEmpAssign
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
