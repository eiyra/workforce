<?php
include('config.php');
if(isset($_GET['admin_ic']))
{
$admin_ic=$_GET['admin_ic'];
$query1=mysqli_query($con,"delete from admin where admin_ic='$admin_ic'");
if($query1)
{
  echo "<script>alert('Successfully deleted!');";
  echo "window.location.href = 'adminViewAdmin.php';</script>";
}
}
?>
