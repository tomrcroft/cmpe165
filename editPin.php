<?php
session_start();

include 'queries.php';

$userName = $_POST["username"];
$oldBoardName = $_POST["oldPinName"];
$newBoardName = $_POST["newPinName"];
$desc = $_POST["description"];

editPin($userName, $oldBoardName, $newBoardName, $desc);

//header('Location: http://localhost/cmpe165/myBoards.php');

?>