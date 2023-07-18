<?php
include('config.php');
if(isset($_GET['fingerNo']))
{
$fingerNo=$_GET['fingerNo'];
$query1=mysqli_query($con,"delete from fingerprint where fingerNo='$fingerNo'");
if($query1)
{
  echo "<script>alert('Data successfully deleted!');";
  echo "window.location.href = 'empFWList.php';</script>";
}
}
?>