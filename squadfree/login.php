<?php
session_start();

//echo "start ";
//create connection with db
include ('dbconnector.php');

//echo "db included ";


//fetch data from the login form
$username = mysqli_real_escape_string($connection,$_POST['username']);
$password = $_POST['password'];
$row = "";
//echo "k got the post info ";


$sql= "SELECT * FROM userInfo WHERE username = '$username'";
$result = mysqli_query($connection ,$sql);
$count = mysqli_num_rows($result);

if($count == 1) {
	
	$row = $result->fetch_array(MYSQLI_ASSOC);
	
	if (password_verify($password, $row["password"])) {
    	$_SESSION["username"] = $username;
		$_SESSION["password"] = $row["password"];
	}
	else {
    	echo "Error. Incorrect username or password.";
	}
	

} else {

	echo "Incorrect username or password.";

	}

mysqli_close($connection);
?>

<script>
window.location.replace("index.php");
</script>



