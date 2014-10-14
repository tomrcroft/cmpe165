<?php
session_start();

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
function login($username, $password) {
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

function addPin($owner, $board_id, $name, $desc, $path)
{
	global $con;
	
	$result = mysqli_query($con,"INSERT INTO pin (owner, name, description, img_link) VALUES ('$owner', '$name', '$desc', '$path')");
	if($result != '')
		{die("error inserting pin into database");}
		
	$result = mysqli_query($con,"select pin_id from pin WHERE name='$name'");
	if($result != '')
		{die("error getting pin_id from database");}
	$resultArray = mysqli_fetch_array($result);
	$pinId = $resultArray[0];
	
	
	$result = mysqli_query($con,"INSERT INTO pinned_on VALUES ('$pinId', '$board_id')"); 

}

function removePin($user, $pin_id)
{
	global $con;
	
	$result = mysqli_query($con,"delete from pin where pin_id='$pin_id' and owner='$user'");
	
	$result = mysqli_query($con,"INSERT INTO pinned_on VALUES ('$pinId', '$board_id')");
	
	//get board_id of user
	$result = mysqli_query($con,"select board_id from board WHERE owner='$user'");
	if($result != '')
		{die("error getting board_id from database");}
	$resultArray = mysqli_fetch_array($result);
	$boardId = $resultArray[0];
	
	$result = mysqli_query($con,"delete from pinned_on where pin_id='$pin_id' and board_id='$boardId'");

}

function addBoard($user, $name)
{
	global $con;
	
	$result = mysqli_query($con,"insert into board (owner, board_name) values ('$user', '$name')");
}

function removeBoard($board_id)
{
	global $con;
	
	$result = mysqli_query($con,"delete from board where board_id='$board_id'");

	
	$result = mysqli_query($con,"delete from pinned_on where board_id='$board_id'");
}

function getBoardPins($board_id)
{
	global $con;
	
	$result = mysqli_query($con,"select pin_id from pinned_on WHERE board_id='$board_id'");
	if($result != '')
		{die("error getting pin_id from database");}
	$resultArray = mysqli_fetch_array($result);
	return $resultArray;
}

function getBoardByUser($user)
{
	global $con;
	
	$result = mysqli_query($con,"select board_id from board WHERE owner='$user'");
	if($result != '')
		{die("error getting board_id from database");}
	$resultArray = mysqli_fetch_array($result);
	return $resultArray;
}
/*
 * ADD NEW DATABASE/QUERY FUNCTIONS HERE.
 */



?>