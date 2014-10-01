<?php


//user = root
//pass = se165
//DB = setUpDB

$connection=mysqli_connect("localhost:3306","root","se165","setUpDB");

if(mysqli_connect_errno()){
echo"failed to access the Database: " .mysqli_connect_error();
die('ERROR CONNECTING');}


?>