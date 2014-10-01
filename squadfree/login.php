<?php
session_start();

/* Changed by Kjetil to use existing
 * database queries and functions.
 */

// Imports database queries.
include 'queries.php';

// Redirects user to homepage if already logged in.
//if (isset($_SESSION['username'])) {
//	header('location: home.php');
//}

// Checks if the user actually entered this page with the login button.
if (isset($_POST['submit'])) {

	// Get login information and try to log in.
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = $_POST['password'];

	// If login is successful
	if (login($username, $password)) {
		$_SESSION['username'] = $_POST['username'];
		
	} else {
		echo "Error. Incorrect username or password.";
	}
} else {
	echo "Error. Incorrect username or password.";
}

?>

<script>
window.location.replace("index.php");
</script>



