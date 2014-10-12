<?php

/*
 * Includes all the functions from "DatabaseFunctions.php" and
 * "queries.php".
 */

require_once 'constants.php';
$con = connect();

function connect() {
	return mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
}

/** 
 * Checks the connection to the database.
 * 
 * @return true if the connection was successful
 * @return false if the connection was not made
 */
function checkConnection() {
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		return false;
	} else return true;
}

/** 
 * Checks a username's availability.
 * 
 * @param String username the chosen username of the user
 * @return 'true' if the given username is available, 'false' if not.
 */
function usernameAvailable($username) {
	global $con;

	$result = mysqli_query($con,
		"SELECT username 
		 FROM userinfo
		 WHERE username = '$username'"
	);

	if (mysqli_num_rows($result) > 0)
		return false;
	else
		return true;
}

/**
  * Function used to input user into database with all the information
  *
  * takes the information from the registration page and inputs it into the database.
  *
  * @param String $uName is the username of the user whos information will be put in.
  * @param String $password is the password of the user whos information will be put in.
  * @param String $name is the email of the user whos information will be put in.
  */
function register($uName, $password, $name)
{
		global $con;	

	mysqli_query($con,"insert into userInfo (username, realName, password) values('$uName', '$name', '$password');");
	return TRUE;    
}

function getPassword($uName)
{
		global $con;
	
	$result = mysqli_query($con,"select password from userInfo WHERE username='$uName'");
	$resultArray = mysqli_fetch_array($result);
	return $resultArray[0];    
}

function getName($uName)
{
		global $con;
		
	$result = mysqli_query($con,"select realName from userInfo WHERE username='$uName'");
	$resultArray = mysqli_fetch_array($result);
	return $resultArray[0];   
}

/** 
 * Validates a user's username and password on login
 * 
 * @param String username the username specified in the appropriate field on the login page
 * @param String password the password specified in the appropriate field on the login page
 */
function validateLogin($username, $password) {
	global $con;

	$query = "SELECT * FROM userinfo
		WHERE username = ?
		AND password = ?
		LIMIT 1";

	if ($statement = $con->prepare($query)) {
		$statement->bind_param('ss', $username, $password);
		$statement->execute();

		if ($statement->fetch()) {
			$statement->close();
			return true;
		} else return false;
	}
}

/*
 * ADD NEW DATABASE/QUERY FUNCTIONS HERE.
 */



?>