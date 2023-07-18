<?php
include('config.php');
if(isset($_GET['mua_ic']))
{
$mua_ic=$_GET['mua_ic'];
$query1=mysqli_query($con,"delete from makeupartist where mua_ic='$mua_ic'");
if($query1)
{
  echo "<script>alert('Successfully deleted!');";
  echo "window.location.href = 'adminViewMua.php';</script>";
}
}
?>
