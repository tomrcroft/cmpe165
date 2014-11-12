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

//removed change username because it is much more involved than this single update
function editUser($uName, $realname, $password) {
    global $con;
	$hPassword = $hash = password_hash($password, PASSWORD_DEFAULT);
    $result = mysqli_query($con, "update userInfo SET realName='$realname', password='$hPassword' WHERE username='$uName';");
	return $result;
}

function checkUserName($uName) {
    global $con;
    $result = mysqli_query($con, "SELECT * FROM userInfo WHERE username='$uName'");
    if (mysqli_num_rows($result) == 0) {
        return true;
    } else {
        return false;
    }
}

function searchForUsername($uName) {
    global $con;
    $result=  mysqli_query($con, "
		select username from userInfo  
		where username LIKE '%$uName%'");
    $resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
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
function addUser($uName, $realname, $password, $security_question, $security_answer)
{
		global $con;	
		
		$hPassword = $hash = password_hash($password, PASSWORD_DEFAULT);

	$result = mysqli_query($con,"insert into userInfo (username, realName, password, security_question, security_answer) values('$uName', '$realname', '$hPassword', '$security_question', '$security_answer');");
	return $result;    
}

function getPassword($uName)
{
		global $con;
	
	$result = mysqli_query($con,"select password from userInfo WHERE username='$uName'");
	$resultArray = mysqli_fetch_array($result);
	return $resultArray[0];    
}

function verifyPassword($uName, $potentialPassword)
{
		global $con;
	
	$result = mysqli_query($con,"select password from userInfo WHERE username='$uName'");
	$resultArray = mysqli_fetch_array($result);
	//return $resultArray[0];
		if (password_verify($potentialPassword, $resultArray[0])) {
			return true;
			}
		else {
			return false;
			}
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

function addRestaurant($pinId, $owner, $restaurantAddress)
{
	global $con;
	
	$isRestuarant = 1;
	
	mysqli_query($con,"Update pin Set restaurant_indicator='$isRestuarant', restaurant_address='$restaurantAddress' WHERE pin_id='$pinId' and owner='$owner';");
		
//	$result = mysqli_query($con,"select pin_id from pin WHERE name='$name'");
//	$resultArray = mysqli_fetch_array($result);
//	$pinIds = $resultArray[0];
//	
//	
//	$result = mysqli_query($con,"INSERT INTO pinned_on VALUES ('$pinIds', '$board_id')"); 

}
function getBoardOwner($board_id) {
	global $con;
	
	$result = mysqli_query($con,"select owner from board WHERE board_id='$board_id'");
	$resultArray = mysqli_fetch_array($result);
	
	return $resultArray[0];
}

function isRestuarant($board_id) {
    global $con;
    $result=  mysqli_query($con, "
		select restaurant_indicator from pin 
		join pinned_on on pin.pin_id = pinned_on.pin_id 
		where pinned_on.board_id = '$board_id' ");
    $resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
}   

function addPin($owner, $board_id, $name, $desc, $path)
{
	global $con;
	
	$isRestuarant = 0;
	
	$result = mysqli_query($con,"INSERT INTO pin (owner, name, description, img_link, restaurant_indicator) VALUES ('$owner', '$name', '$desc', '$path', '$isRestuarant');");
		
	$result = mysqli_query($con,"select MAX(pin_id) from pin");
	$resultArray = mysqli_fetch_array($result);
	$pinId = $resultArray[0];
	
	
	$result = mysqli_query($con,"INSERT INTO pinned_on VALUES ('$pinId', '$board_id')"); 

}

function repin($pinId, $board_id) {
	global $con;
	
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
function getBoardPreview($boardId)
{
	global $con;

	$query = "	select img_link
				from board join pinned_on on board.board_id = pinned_on.board_id 
					join pin on pinned_on.pin_id = pin.pin_id
				where board.board_id = '$boardId'
				limit 1;";

	$result = mysqli_query($con, $query);
	$resultArray = mysqli_fetch_array($result);
	return $resultArray[0];
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

function getNumberOfPins($user)
{
	global $con;

	$query = "
		select *
		from pin
		where owner = '$user';";

	$result = mysqli_query($con, $query);
	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	return sizeof($resultArray);
}

function getDescriptionOfPins($user)
{
	global $con;

	$query = "
		select description
		from pin
		where owner = '$user';";

	$result = mysqli_query($con, $query);
	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
}

function getNamesOfPins($user)
{
	global $con;

	$query = "
		select name
		from pin
		where owner = '$user';";

	$result = mysqli_query($con, $query);
	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
}

function getNamesOfPinsOnBoard($board_id)
{
	global $con;

	$query = "
		select name
		from pin
		where pin_id IN (
			SELECT pin_id
			FROM pinned_on
			WHERE board_id=".$board_id.");";

	$result = mysqli_query($con, $query);
	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
}

function getDescriptionsOfPinsOnBoard($board_id)
{
	global $con;

	$query = "
		select description
		from pin
		where pin_id IN (
			SELECT pin_id
			FROM pinned_on
			WHERE board_id=".$board_id.");";

	$result = mysqli_query($con, $query);
	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
}

function getBoardsByCategory($category) 
{
	global $con;

	$query = "
		select *
		from board
		where category = '$category';";

	$result = mysqli_query($con, $query);
	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
}

function getPinId($board_id)
{
    global $con;
	
	$query = "Select pin_id from pinned_on WHERE board_id='$board_id';";
    $result= mysqli_query($con, $query);
	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
}

function follow($uname, $userToFollow)
{
	global $con;
	
		$result = mysqli_query($con,"INSERT INTO follow VALUES ('$uname', '$userToFollow')");
		
}

function isFollowing($uname, $following) {
	global $con;
	$result = mysqli_query($con, "SELECT * FROM follow WHERE username='$uname' AND followUser='$following'");

	if (mysqli_num_rows($result) == 0)
		return false;
	else 
		return true;
}

function unFollow($uname, $userToFollow) {
	global $con;
	$result = mysqli_query($con, "DELETE FROM follow WHERE username='$uname' AND followUser='$userToFollow'");
}

function getRestaurantAddress($pinId)
{
    global $con;
    $result=  mysqli_query($con, "Select restaurant_address from pin Where pin_id='$pinId';");
    $resultArray = mysqli_fetch_array($result);
	return $resultArray[0]; 
    
}
function getFollowing($uname)
{
	global $con;

	$query = "
		select followUser
		from follow
		where username = '$uname';";

	$result = mysqli_query($con, $query);
	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
}

function getSecurityQuestion($username) {
    global $con;
    $result = mysqli_query($con, "SELECT security_question FROM userInfo WHERE username='$username'");
    $row=mysqli_fetch_array($result,MYSQLI_NUM);
	return $row[0]; 
}

function validateSecurityAnswer($securityanswer, $uName) {
    global $con;
    $result = mysqli_query($con, "SELECT securityAnswer FROM userInfo WHERE username='$uName'");
    if (mysqli_num_rows($result) == $securityanswer) {
        return true;
    } else {
        return false;
    }
}

function getLatitude($pinid) {
    global $con;
    $result = mysqli_query($con, "SELECT latitude FROM pin WHERE pin_id='$pinid'");
    $resultArray = mysqli_fetch_array($result);
	return $resultArray[0]; 
}

function getLongitude($pinid) {
    global $con;
    $result = mysqli_query($con, "SELECT longitude FROM pin WHERE pin_id='$pinid'");
    $resultArray = mysqli_fetch_array($result);
	return $resultArray[0]; 
}

function validateUser($username)
{
	global $con;
    $result = mysqli_query($con, "SELECT * FROM userInfo WHERE username='$username'");
    if (mysqli_num_rows($result) == 0) {
        return false;
    } else {
        return true;
    }
}

function addTag($board_id, $tag)
{
	global $con;
	$result = mysqli_query($con, "INSERT INTO tags
									VALUES('$board_id', '$tag');");
	return $result;
}

function removeTag($board_id, $tag)
{
	global $con;
	$result = mysqli_query($con, "delete from tags
									WHERE board_id=$board_id AND tag='$tag';");
	return $result;
}

function addComment($pin_id, $author, $comment_content)
{
	global $con;
	$result = mysqli_query($con, "INSERT INTO comments
									VALUES('$pin_id', '$author', '$comment_content');");
	return $result;
}

function removeComment($pin_id, $author, $comment_content)
{
	global $con;
	$result = mysqli_query($con, "delete from comments
									WHERE pin_id=$pin_id AND author='$author' AND comment_content='$comment_content';");
	return $result;
}

function getComments($pin_id) {
	global $con;

	$query = "
		SELECT comment_content
		FROM comments
		WHERE pin_id = '$pin_id';";

	$result = mysqli_query($con, $query);
	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
}

function getCommentAuthors($pin_id) {
	global $con;

	$query = "
		SELECT author
		FROM comments
		WHERE pin_id = '$pin_id';";

	$result = mysqli_query($con, $query);
	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
}

function addLike($user_id, $pin_id)
{
	global $con;
	$result = mysqli_query($con, "INSERT INTO likes
									VALUES($user_id, $pin_id);");
	return $result;
}

function removeLike($user_id, $pin_id)
{
	global $con;
	$result = mysqli_query($con, "delete from likes
									WHERE user_id=$user_id AND pin_id=$pin_id;");
	return $result;
}

function getPinName($pin_id) {
    global $con;

    $query = "
        select name
        from pin
        where pin_id = '$pin_id'";

    $result = mysqli_query($con, $query);
    $resultArray = mysqli_fetch_array($result);
	return $resultArray[0];   
}

function getPinImage($pin_id) {
    global $con;

    $query = "
        select img_link
        from pin
        where pin_id = '$pin_id'";

    $result = mysqli_query($con, $query);
    $resultArray = mysqli_fetch_array($result);
	return $resultArray[0];
}

function getPinOwner($pin_id) {
    global $con;

    $query = "
        select owner
        from pin
        where pin_id = '$pin_id'";

    $result = mysqli_query($con, $query);
    $resultArray = mysqli_fetch_array($result);
	return $resultArray[0];
}

/*
 * ADD NEW DATABASE/QUERY FUNCTIONS HERE.
 */



?>