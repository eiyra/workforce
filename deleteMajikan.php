<?php
include('config.php');
if(isset($_GET['majikanNo']))
{
$majikanNo=$_GET['majikanNo'];
$query1=mysqli_query($con,"delete from majikan where majikanNo='$majikanNo'");
if($query1)
{
  echo "<script>alert('Data successfully deleted!');";
  echo "window.location.href = 'empFWList.php';</script>";
}
}
?>