<?php
include('config.php');
if(isset($_GET['medicalNo']))
{
$medicalNo=$_GET['medicalNo'];
$query1=mysqli_query($con,"delete from medical where medicalNo='$medicalNo'");
if($query1)
{
  echo "<script>alert('Data successfully deleted!');";
  echo "window.location.href = 'empFWList.php';</script>";
}
}
?>