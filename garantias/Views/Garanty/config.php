<?php
session_start();

$host = "localhost";    /* Host name */
$user = "root";         /* User */
$password = "";         /* Password */
$dbname = "digitalmtx_dtmmtx";   /* Database name */


// $host = "localhost";    /* Host name */
// $user = "digitalmtx_dtmmtx";         /* User */
// $password = "C,u/tA/?NRy><XT/4";         /* Password */
// $dbname = "digitalmtx_dtmmtx";   /* Database name */
// Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
