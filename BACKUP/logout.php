<?php
session_start();
include 'queries.php';
session_destroy();

header('location: login.php');
?>