
  <?php
  include ('config.php');

  $mua_ic = $_POST["ic"];
  $mua_name = $_POST["name"];
  $mua_email = $_POST["email"];
  $mua_address = $_POST["location"];
  $latitude = $_POST["lat"];
  $longitude = $_POST["lng"];
  $mua_phone_no = $_POST["phoneno"];
  $mua_gender = $_POST["gender"];
  $mua_charge = $_POST["charge"];


$sql = "UPDATE makeupartist SET  mua_name='".$mua_name."' , mua_email='" .$mua_email."' , mua_address='" .$mua_address."' , latitude='" .$latitude."' , longitude='" .$longitude."', mua_phone_no='" .$mua_phone_no."' , mua_gender='" .$mua_gender."', mua_charge='" .$mua_charge."'
 WHERE mua_ic= '".$mua_ic."'";
$result = mysqli_query($con,$sql) or (mysqli_connect_error());

echo '<script type="text/javascript">';
echo 'alert("Successfully updated!");';
echo 'window.location.href = "adminViewMua.php";';
echo '</script>';


 ?>
