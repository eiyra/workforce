 <?php
  include ('config.php');

  $fw_id = $_POST["fw_id"];
  $fw_name = $_POST["fw_name"];
  $fw_nation = $_POST["fw_nation"];
  $fw_phone = $_POST["fw_phone"];
  $fw_phone2 = $_POST["fw_phone2"];
  $fw_phone3 = $_POST["fw_phone3"];
  $fw_address = $_POST["fw_address"];
  $fw_remarks = $_POST["fw_remarks"];



$sql = "UPDATE fw SET  fw_name='".$fw_name."' , fw_nation='" .$fw_nation."' , fw_phone='" .$fw_phone."' , fw_phone2='" .$fw_phone2."' , 
fw_phone3='" .$fw_phone3."' , fw_address='".$fw_address."' , fw_remarks='".$fw_remarks."' 
 WHERE fw_id= '".$fw_id."'";
$result = mysqli_query($con,$sql) or (mysqli_connect_error());

echo '<script type="text/javascript">';
echo 'alert("Successfully updated!");';
echo 'window.location.href = "empFWList.php";';
echo '</script>';


 ?>