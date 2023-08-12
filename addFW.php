<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fw_name = $_POST["fw_name"];
    $fw_nation = $_POST["fw_nation"];
    $fw_year = $_POST["fw_year"];
    $fw_phone = $_POST["fw_phone"];
    $fw_phone2 = $_POST["fw_phone2"];
    $fw_phone3 = $_POST["fw_phone3"];
    $fw_address = $_POST["fw_address"];
    $fw_gender = $_POST["fw_gender"];
    $fw_intake = $_POST["fw_intake"];
    $cvDateInput = $_POST["cvDateInput"];
    $cvBatchInput = $_POST["cvBatchInput"];
    $fw_register = $_POST["fw_register"];
    $fw_status = "APPROVED";
    $fw_remarks = $_POST["fw_remarks"];
    $emp_name = $_POST["emp_name"];
    $majikanName = $_POST["majikanName"];

    // Prepare and bind the INSERT query for "fw" table
    $insert_fw_query = "INSERT INTO fw (fw_name, fw_nation, fw_year, fw_phone, fw_phone2, fw_phone3, fw_address, fw_gender, fw_intake, cvDateInput, cvBatchInput, fw_register, fw_status, fw_remarks, emp_assigned)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $insert_fw_query);
    mysqli_stmt_bind_param($stmt, "sssssssssssssss", $fw_name, $fw_nation, $fw_year, $fw_phone, $fw_phone2, $fw_phone3, $fw_address, $fw_gender, $fw_intake, $cvDateInput, $cvBatchInput, $fw_register, $fw_status, $fw_remarks, $emp_name);

    if (mysqli_stmt_execute($stmt)) {
        $fw_id = mysqli_insert_id($con); // Get the last inserted ID (fw_id)

        if ($fw_register === "OTHERS" && !empty($majikanName)) {
            // Prepare and bind the INSERT query for "majikan" table
            $insert_majikan_query = "INSERT INTO majikan (majikanName, majikanEmpAssign, fw_id) VALUES (?, ?, ?)";

            $stmt_majikan = mysqli_prepare($con, $insert_majikan_query);
            mysqli_stmt_bind_param($stmt_majikan, "sss", $majikanName, $emp_name, $fw_id);

            if (mysqli_stmt_execute($stmt_majikan)) {
                echo "<script>alert('Successfully added!');";
                echo "window.location.href = 'empDashboard.php';</script>";
            } else {
                echo "<script>alert('Error inserting Employer data!');</script>";
                echo "window.location.href = 'empFWList.php';</script>";
            }
        } else {
            echo "<script>alert('Successfully added!');";
            echo "window.location.href = 'empDashboard.php';</script>";
        }
    } else {
        echo "<script>alert('Error inserting data into table!');</script>";
        echo "window.location.href = 'empFWList.php';</script>";
    }

    // Close prepared statements
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt_majikan);
}

mysqli_close($con);
?>
