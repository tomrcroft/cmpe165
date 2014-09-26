<?php

/*
 * @Author Kjetil Svalestuen
 * 
 * Contains MySQL queries used to access the userinfo-database.
 */

require_once 'constants.php';
$con = connectionOpen();

/** Returns a connection to MySQL. */
function connectionOpen() {
	return mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
}

/** 
 * Checks the connection to the database.
 * 
 * @return true if the connection was successful
 * @return false if the connection was not made
 */
function connectionValid() {
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		return false;
	} else return true;
}

/** 
 * Returns 'true' if the given username is available, 'false' if it is already taken.
 * 
 * @param String username the chosen username of the user
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
 * Adds a new user to the database
 * 
 * @param String user the chosen username of the user
 * @param String name the real name of the user
 * @param String password the password the user has chosen
 */
function insertUser($user, $name, $password) {
	global $con;
	
	mysqli_query($con, 
		"INSERT INTO userinfo (username, realname, password)
		 VALUES ('$user', '$name', '$password')"
	);

	return true;
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
		WHERE username = '$username'
		AND password = '$password'";

	$result = mysqli_query($con, $query);
	if (mysqli_num_rows($result) > 0)
		return true;
	else
		return false;
}