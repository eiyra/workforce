<?php
include('config.php');
if(isset($_GET['passNo']))
{
$passNo=$_GET['passNo'];
$query1=mysqli_query($con,"delete from passport where passNo='$passNo'");
if($query1)
{
  echo "<script>alert('Data successfully deleted!');";
  echo "window.location.href = 'empFWList.php';</script>";
}
}
?>