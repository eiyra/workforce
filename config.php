<?php
// $con = mysqli_connect("localhost","root","","workforce");

// // Check connection
// if (mysqli_connect_errno())
//   {
// 	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
// 	  echo "<meta http-equiv=\"refresh\" content=\"3;URL=../index\">";
//   }

// $host        = "host = app-ee404687-ef72-4c54-b18b-ef6f2fcfa48b-do-user-14511752-0.b.db.ondigitalocean.com";
// $port        = "port = 25060";
// $dbname      = "dbname = workforcedb";
// $credentials = "user = workforcedb password=AVNS_R18UHHCcBlRaV75tK8E";
// $ssl         = "ssl = require";

// $db = pg_connect( "$host $port $dbname $credentials $ssl" );

$conn_string = "host=app-ee404687-ef72-4c54-b18b-ef6f2fcfa48b-do-user-14511752-0.b.db.ondigitalocean.com port=25060 dbname=workforcedb user=workforcedb password=AVNS_R18UHHCcBlRaV75tK8E ssl=require";
$dbconn4 = pg_connect($conn_string);

if (!$dbconn4) {
   echo "Error : Unable to open database\n";
} else {
   echo "Opened database successfully\n";
}
?>