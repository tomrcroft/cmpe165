<?php

session_start();
include 'actions.php';
// If user is not logged in, redirect it
if (!(isset($_SESSION['username']))) {
    header("location:index.php"); //to redirect back to "index.php" after logging out
    exit();
}

$username = $_SESSION['username'];
if (isset($_POST['submitAddAddress'])) {
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $pinid=$_POST['pinid'];
    $combine = $address . ' ' . $city . ' ' . $state . ', ' . $zip;
   
    addRestaurant($pinid, $username, $combine);
}

?>
