<?php
session_start();

include 'queries.php';

$userName = $_POST["username"];
$pinName = $_POST["pinName"];
$newPinImageLink = $_POST["newLink"];

editPinLink($userName, $pinName, $newPinImageLink);

//header('Location: http://localhost/cmpe165/myBoards.php');

?>