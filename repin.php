<?php

session_start();
include 'actions.php';
// If user is not logged in, redirect it
if (!(isset($_SESSION['username']))) {
    header("location:index.php"); //to redirect back to "index.php" after logging out
    exit();
}

if (isset($_POST['submitRepin'])) {
    $pinID = $_POST['repinID'];
    $boardID = $_POST['boardID'];
    repin($pinID, $boardID);
    header("location:myBoards.php?username=".$_SESSION['username']);
} else {
    header("location:index.php"); //to redirect back to "index.php" after logging out
}
?>
