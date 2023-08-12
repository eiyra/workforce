<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fw_id = $_POST["fw_id"];
    $medicalDate = $_POST["medicalDate"];
    $immDate = $_POST["immDate"];
    $medicalStatus = $_POST["medicalStatus"];
    $medicNote = $_POST["medicNote"];
    $medicEmpAssign = $_POST["medicEmpAssign"];

    // Prepare and bind the statement
    $stmt = $con->prepare("INSERT INTO medical (fw_id, medicalDate, immDate, medicalStatus, medicNote, medicEmpAssign) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $fw_id, $medicalDate, $immDate, $medicalStatus, $medicNote, $medicEmpAssign);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Successfully added!');";
        echo "window.location.href='empViewFW.php?fw_id=" . $fw_id . "';</script>";
    } else {
        echo "<script>alert('Error inserting data: " . $stmt->error . "');";
        echo "window.location.href='empViewFW.php?fw_id=" . $fw_id . "';</script>";
    }

    $stmt->close();
    $con->close();
}
?>


