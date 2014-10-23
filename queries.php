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
		 FROM userInfo
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
function addUser($uName, $realname, $password)
{
		global $con;	

	mysqli_query($con,"insert into userInfo (username, realName, password) values('$uName', '$realname', '$password');");
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
function verifyLogin($username, $password) {
	global $con;

	$query = "SELECT * FROM userInfo
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
	//$resultArray = mysqli_fetch_array($result);
	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
}

function getPinLinks($board_id) {
	global $con;
	
	$result = mysqli_query($con, "
		select img_link from pin 
		join pinned_on on pin.pin_id = pinned_on.pin_id 
		where pinned_on.board_id = '$board_id'");

	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
		array_push($outputArray, $resultArray[$x][0]);

	return $outputArray;
}

// Gets board IDs
function getBoardByUser($user)
{
	global $con;
	
	$result = mysqli_query($con,"select board_id from board WHERE owner='$user'");
	//if($result != '')
	//	{die("error getting board_id from database");}
	//$resultArray = mysqli_fetch_array($result);
	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
}

// Get board names.
function getBoardNames($user)
{
	global $con;

	$query = "	select board_name
				from board
				where owner = '$user';";

	$result = mysqli_query($con, $query);
	//$resultArray = mysqli_fetch_array($result);
	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
}

// Get board's first pin's image to show as a preview
function getBoardPreviews($user)
{
	global $con;

	$query = "	select img_link
				from board join pinned_on on board.board_id = pinned_on.board_id 
							join pin on pinned_on.pin_id = pin.pin_id
				where board.owner = '$user'
				order by board.board_id;";

	$result = mysqli_query($con, $query);
	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
}

function getBoardName($board_id) {
	global $con;

	$query = "
		select board_name
		from board
		where board_id = '$board_id'";

	$result = mysqli_query($con, $query);
	$resultArray = mysqli_fetch_array($result);
	return $resultArray[0];   
}

function editBoardName($userName, $oldBoardName, $newBoardName)
{
	global $con;
	
	$result = mysqli_query($con,"update board set board_name='$newBoardName' where owner='$userName' and board_name='$oldBoardName';");
}

function editPinName($userName, $oldPinName, $newPinName, $desc)
{
	global $con;
	
	$result = mysqli_query($con,"update pin set name='$newPinName', description='$desc' where owner='$userName' and name='$oldPinName';");
	
	return $result;
}

function editPinLink($userName, $pinName, $newPinImageLink)
{
	global $con;
	
	$result = mysqli_query($con,"update pin set img_link='$newPinImageLink' where name='$pinName' and owner='$userName';");
	
	return $result;
}
/*
 * ADD NEW DATABASE/QUERY FUNCTIONS HERE.
 */



?>