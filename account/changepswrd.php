<?php
 require_once '../api/database.php';
// Get username and password from session variables. 
$username = $_SESSION['username'];  // Get username from session variable. 

 // Check if POST contains new password and username.  
if(isset($_POST['password']) && isset($username)){

    // Get new password from POST request.  										   
    $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Prepare SQL statement for updating user's password in database.  			   
    $sql = "UPDATE $table SET $passwordColumn='$newPassword' WHERE $nicknameColumn='$username'";

    // Execute SQL statement for updating user's password in database.  	    	  
    if ($conn->query($sql) === TRUE) {	    	    	    	     

        header('Location: /account');

    } else {

        echo "Error updating record: " . $conn->error;

    }

 } else {

     echo "No new password provided or not authorised.";

 }