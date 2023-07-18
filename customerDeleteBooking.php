<?php
include('config.php');
if(isset($_GET['app_id']))
{
$app_id=$_GET['app_id'];
$query1=mysqli_query($con,"delete from appointment where app_id='$app_id'");
if($query1)
{
  echo "<script>alert('Appointment deleted!');";
  echo "window.location.href = 'customerCheckApp.php';</script>";
}
}
?>
