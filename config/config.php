<?php
$con = mysqli_connect("localhost","root","","workforce");

// Check connection
if (mysqli_connect_errno())
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  echo "<meta http-equiv=\"refresh\" content=\"3;URL=../index\">";
  }
  
?>
