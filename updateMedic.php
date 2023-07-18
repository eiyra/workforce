 <?php
  include ('config.php');

  $fw_id = $_POST["fw_id"];
  $medicalDate = $_POST["medicalDate"];
  $immDate = $_POST["immDate"];
  $medicalStatus = $_POST["medicalStatus"];
  $medicNote = $_POST["medicNote"];
  $medicEmpAssign = $_POST["medicEmpAssign"];



$sql = "UPDATE medical SET  medicalDate='".$medicalDate."' , immDate='" .$immDate."' , medicalStatus='" .$medicalStatus."' , medicNote='" .$medicNote."' , 
medicEmpAssign='" .$medicEmpAssign."' 
 WHERE fw_id= '".$fw_id."'";
$result = mysqli_query($con,$sql) or (mysqli_connect_error());

echo '<script type="text/javascript">';
echo 'alert("Successfully updated!");';
echo 'window.location.href = "empFWList.php";';
echo '</script>';


 ?>