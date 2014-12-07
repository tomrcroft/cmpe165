<?php
	session_start(); 
	include 'actions.php';
	$uName = $_SESSION['username'];
	$email = getEmail($uName);
	$confirm_code= getConfirmKey($uName); 
	$confirmLink = "http://www.corq.org/index.php?username=$uName&verify=$confirm_code";
	sendMail ($email,$confirmLink);
?>