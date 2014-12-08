<?php
	session_start(); 
	include 'actions.php';
	if (isset($_POST['pin_id'])) {
		addLike($_SESSION['username'], $_POST['pin_id']);
	}
?>