<?php
session_start();

	if (isset($_SESSION['username']))
		echo 'Welcome, ', $_SESSION["username"];
	else
		header('location: login.php');
?>

<!DOCTYPE html>
<html>
<head> 
	<title>Logged in</title>
</head>
<body>
	<div id="container">
		<a href="logout.php">Log out</a>
	</div>
</body>
</html>