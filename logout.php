<?php   
session_start(); //to ensure you are using same session
$_SESSION = array(); // Unset all of the session variables.
session_destroy(); //destroy the session

header("location:index.php"); //to redirect back to "index.php" after logging out
exit();
?>