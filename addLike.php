<?php
	session_start(); 
	include 'actions.php';
	if ($_GET['ajax']) {
		addLike($_SESSION['username'], $_GET['pin_id']);
	}
?>