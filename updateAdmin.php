
  <?php
  include ('config.php');

  $admin_ic = $_POST["ic"];
  $admin_name = $_POST["name"];
  $admin_email = $_POST["email"];
  $admin_address = $_POST["address"];
  $admin_phone_no = $_POST["phoneno"];
  $admin_gender = $_POST["gender"];



$sql = "UPDATE admin SET  admin_name='".$admin_name."' , admin_email='" .$admin_email."' , admin_address='" .$admin_address."' , admin_phone_no='" .$admin_phone_no."' , admin_gender='" .$admin_gender."'
 WHERE admin_ic= '".$admin_ic."'";
$result = mysqli_query($con,$sql) or (mysqli_connect_error());

echo '<script type="text/javascript">';
echo 'alert("Successfully updated!");';
echo 'window.location.href = "adminViewAdmin.php";';
echo '</script>';


 ?>
