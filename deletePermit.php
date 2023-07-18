<?php
include('config.php');
if(isset($_GET['permitNo']))
{
$permitNo=$_GET['permitNo'];
$query1=mysqli_query($con,"delete from permit where permitNo='$permitNo'");
if($query1)
{
  echo "<script>alert('Data successfully deleted!');";
  echo "window.location.href = 'empFWList.php';</script>";
}
}
?>