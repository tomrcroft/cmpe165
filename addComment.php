<?php

session_start();
include 'actions.php';
// If user is not logged in, redirect it
if (!(isset($_SESSION['username']))) {
    header("location:index.php"); //to redirect back to "index.php" after logging out
    exit();
}

$username = $_SESSION['username'];
if (isset($_POST['submitCommentSend'])) {
	$pin_id = $_POST['commentPinID'];
	$author = $_SESSION['username'];
   	$comment_content = $_POST['comment']; 
   addComment($pin_id, $author, $comment_content);
   header("location:myBoards.php?username=".$_SESSION['username']);
}

?>