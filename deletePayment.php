<?php
include('config.php');
if(isset($_GET['payNo']))
{
$payNo=$_GET['payNo'];
$query1=mysqli_query($con,"delete from payment where payNo='$payNo'");
if($query1)
{
  echo "<script>alert('Data successfully deleted!');";
  echo "window.location.href = 'empFWList.php';</script>";
}
}
?>