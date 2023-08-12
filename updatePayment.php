<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fw_id = $_POST["fw_id"];
    $fwType = $_POST["fwType"];
	$payNo = $_POST["payNo"];
    $serialOne = $_POST["serialOne"];
    $firstPayDate = $_POST["firstPayDate"];
    $firstPay = $_POST["firstPay"];
    $firstMethod = $_POST["firstMethod"];
	$serialTwo = $_POST["serialTwo"];
    $secondPayDate = $_POST["secondPayDate"];
    $secondPay = $_POST["secondPay"];
    $secondMethod = $_POST["secondMethod"];
	$serialThree = $_POST["serialThree"];
    $thirdPayDate = $_POST["thirdPayDate"];
    $thirdPay = $_POST["thirdPay"];
    $thirdMethod = $_POST["thirdMethod"];
	$serialFour = $_POST["serialFour"];
    $fourthPayDate = $_POST["fourthPayDate"];
    $fourthPay = $_POST["fourthPay"];
    $fourthMethod = $_POST["fourthMethod"];
	$serialFive = $_POST["serialFive"];
    $fifthPayDate = $_POST["fifthPayDate"];
    $fifthPay = $_POST["fifthPay"];
    $fifthMethod = $_POST["fifthMethod"];
	$serialSix = $_POST["serialSix"];
    $sixthPayDate = $_POST["sixthPayDate"];
    $sixthPay = $_POST["sixthPay"];
    $sixthMethod = $_POST["sixthMethod"];
	$serialSeven = $_POST["serialSeven"];
    $seventhPayDate = $_POST["seventhPayDate"];
    $seventhPay = $_POST["seventhPay"];
    $seventhMethod = $_POST["seventhMethod"];
	$payStatus = $_POST["payStatus"];
	$totalPay = $_POST["totalPay"];
	$payNote = $_POST["payNote"];
	$payEmpAssign = $_POST["payEmpAssign"];

    // Use prepared statement
    $sql = "UPDATE payment SET
            fwType = ?,
            serialOne = ?,
            firstPayDate = ?,
            firstPay = ?,
            firstMethod = ?,
			serialTwo = ?,
            secondPayDate = ?,
            secondPay = ?,
            secondMethod = ?,
			serialThree = ?,
            thirdPayDate = ?,
            thirdPay = ?,
            thirdMethod = ?,
			serialFour = ?,
            fourthPayDate = ?,
            fourthPay = ?,
            fourthMethod = ?,
			serialFive = ?,
            fifthPayDate = ?,
            fifthPay = ?,
            fifthMethod = ?,
			serialSix = ?,
            sixthPayDate = ?,
            sixthPay = ?,
            sixthMethod = ?,
			serialSeven = ?,
            seventhPayDate = ?,
            seventhPay = ?,
            seventhMethod = ?,
			payStatus = ?,
			totalPay = ?,
            payNote = ?,
            payEmpAssign = ?
            WHERE payNo = ?";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssssssss",
        $fwType, $serialOne, $firstPayDate, $firstPay, $firstMethod,
        $serialTwo, $secondPayDate, $secondPay, $secondMethod,
        $serialThree, $thirdPayDate, $thirdPay, $thirdMethod,
        $serialFour, $fourthPayDate, $fourthPay, $fourthMethod,
        $serialFive, $fifthPayDate, $fifthPay, $fifthMethod,
        $serialSix, $sixthPayDate, $sixthPay, $sixthMethod,
        $serialSeven, $seventhPayDate, $seventhPay, $seventhMethod,
		$payStatus, $totalPay, $payNote, $payEmpAssign,
        $payNo
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