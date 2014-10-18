<?php
session_start();

include 'queries.php';

$userName = $_POST["username"];
$oldBoardName = $_POST["oldBoardName"];
$newBoardName = $_POST["newBoardName"];

editBoardName($userName, $oldBoardName, $newBoardName);

//header('Location: http://localhost/cmpe165/myBoards.php');

?>