<?php

$host = "localhost";
$username = "username";
$password = "password";
$database = "database_name";
$table = "users";
$nicknameColumn = "nickname";
$passwordColumn = "password";

 
// Create connection
$conn = mysqli_connect($host, $username, $password, $database);
 
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

session_start();
?>
