<?php session_start();


require_once 'queries.php';

//fetching data from HTML file and insert into the database 
//the name of the variables might need to be changed due to the difference in naming in HTML code 

$realname = mysqli_real_escape_string ($con, $_POST['realname']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$password= mysqli_real_escape_string($con, $_POST['password']);
$passwordverify = mysqli_real_escape_string($con, $_POST['passverify']);


if ($password == $passwordverify) {
    register($username, $realname, $password);
} else {
    echo "Passwords did not match.";
}

?>

<script>
window.location.replace("index.php");
</script>
