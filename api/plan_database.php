<?php

$planHost  = "localhost";
$planUsername = "username";
$planPassword = "password";
$planDatabase = "database_name";

 
// Create connection
$planConn = mysqli_connect($planHost, $planUsername, $planPassword, $planDatabase);
 
// Check connection
if (!$planConn) {
    die("Connection failed: " . mysqli_connect_error());
} 
echo "Connected successfully"; 

?>