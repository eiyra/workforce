
<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fw_id = $_POST["fw_id"];
    $fingerDate = $_POST["fingerDate"];
    $fingerBatch = $_POST["fingerBatch"];
    $fingerStatus = $_POST["fingerStatus"];
    $fingerNote = $_POST["fingerNote"];
    $fingerEmpAssign = $_POST["fingerEmpAssign"];

    $sql = "INSERT INTO fingerprint (fw_id, fingerDate, fingerBatch, fingerStatus, fingerNote, fingerEmpAssign)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss",
        $fw_id, $fingerDate, $fingerBatch,
        $fingerStatus, $fingerNote, $fingerEmpAssign
    );

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
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


