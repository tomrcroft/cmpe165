<?php
	session_start(); 
	include 'actions.php';
	if ($_GET['ajax']) {
		if ($_GET['add'] == 1) {
			addLike($_SESSION['username'], $_GET['pin_id']);
		} else if ($_GET['remove'] == 1) {
			removeLike($_SESSION['username'], $_GET['pin_id']);
		}
	}
?>