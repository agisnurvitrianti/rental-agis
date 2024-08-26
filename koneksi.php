<?php
$host = "localhost";
$username = "root";
$password = "";
$database_name = "rental-agis";

$db_link = mysqli_connect($host, $username, $password, $database_name);

if (!$db_link) {
   
    error_log("Connection failed: " . mysqli_connect_error());
    die("Unable to connect to the database. Please try again later.");
}
?>
