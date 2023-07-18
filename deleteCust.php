<?php
include('config.php');
if(isset($_GET['customer_ic']))
{
$customer_ic=$_GET['customer_ic'];
$query1=mysqli_query($con,"delete from customer where customer_ic='$customer_ic'");
if($query1)
{
  echo "<script>alert('Successfully deleted!');";
  echo "window.location.href = 'adminViewCustomer.php';</script>";
}
}
?>
