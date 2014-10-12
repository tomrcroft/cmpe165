<?php
session_start();

include 'queries.php';

if (isset($_SESSION['username'])) {
	header('location: home.php');
}

if (isset($_POST['submit'])) {
	if (validateLogin($_POST['username'], $_POST['password'])) {
		$_SESSION['username'] = $_POST['username'];
		header('location: home.php');
	} else {
		$_SESSION['login_message'] = "Wrong username or password.";
		header('location: login.php');
	}
} else {
	header('location: login.php');
}

?>