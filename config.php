<?php
$host = "localhost";
$username = "id21139535_workforce";
$password = "@Workforce123";
$dbname = "id21139535_workforce";

$con = mysqli_connect($host, $username, $password, $dbname);

if(!$con){
    echo("Cannot connect to database");
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>
