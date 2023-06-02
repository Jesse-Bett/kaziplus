<?php
// Purpose: To connect to the database

$hostName= "localhost";
$userName = "root";
$password = "";
$dbName = "kazi_app";

// Create a new MySQLi instance
$conn = mysqli_connect($hostName, $userName, $password, $dbName);

if(mysqli_connect_errno()){
    echo "failed To Connect!";
    exit(); 
 }
 
?>




