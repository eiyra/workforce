<?php

$host = 'app-ee404687-ef72-4c54-b18b-ef6f2fcfa48b-do-user-14511752-0.b.db.ondigitalocean.com'; // Replace with your actual host
$port = 25060; // Replace with your actual port (25060 for SSL, 5432 for non-SSL)
$dbname = 'workforcedb'; // Replace with your actual database name
$user = 'workforcedb'; // Replace with your actual username
$password = 'AVNS_R18UHHCcBlRaV75tK8E'; // Replace with your actual password

// Construct the connection string
$connectionString = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Create a PostgreSQL database connection
$db = pg_connect($connectionString);

if (!$db) {
   echo "Error : Unable to open database\n";
   // die("Connection failed: " . pg_last_error());
}

// Close the connection when done
pg_close($db);

?>