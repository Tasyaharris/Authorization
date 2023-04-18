<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = " ";
$dbname = "authentication";
/* Attempt to connect to MySQL database */
$conn = mysqli_connect($dbhost, $dbuser,$dbpass, $dbname);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>