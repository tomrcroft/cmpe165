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
function editUser($uName, $password) {
    global $con;
	$hPassword = $hash = password_hash($password, PASSWORD_DEFAULT);
    $result = mysqli_query($con, "update userInfo SET password='$hPassword' WHERE username='$uName';");
	return $result;
}
function checkUserName($uName) {
    global $con;
    $result = mysqli_query($con, "SELECT * FROM userInfo WHERE username='$uName'");
    if (mysqli_num_rows($result) == 0) {
        return 1;
    } else {
        return 0;
    }
}
function searchForUsername($uName) {
    global $con;
    $query =  "
		select username from userInfo  
		where username LIKE '%$uName%'";
			
		$result = $con->query($query);
		$resultArray = array();
		while ($row = $result->fetch_assoc()) {
			$resultArray[] = $row[username];
		}
		return $resultArray;
}
	/*
    $resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
}*/
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
function addUser($uName, $realname, $password, $security_question, $security_answer, $email)
{
		global $con;	
		$confirm_code=md5(uniqid(rand())); 
		$confirmLink = "http://www.corq.org/index.php?username=".$uName."&verify=".$confirm_code;
		$hPassword = $hash = password_hash($password, PASSWORD_DEFAULT);
		$verified = '0';
	$result = mysqli_query($con,"insert into userInfo (username, realName, password, security_question, security_answer, email, verified,confirmKey) values('$uName', '$realname', '$hPassword', '$security_question', '$security_answer','$email','$verified','$confirm_code');");
	sendMail ($email,$confirmLink);
	
	return $result;    
}

function getEmail($uName){
	global $con;
	
	$result = mysqli_query($con,"select email from userInfo WHERE username='$uName'");
	$resultArray = mysqli_fetch_array($result);
	return $resultArray[0]; 
}

function getConfirmKey($uName){
	global $con;
	
	$result = mysqli_query($con,"select confirmKey from userInfo WHERE username='$uName'");
	$resultArray = mysqli_fetch_array($result);
	return $resultArray[0]; 
}

function sendMail($email,$confirmLink)
{
	require_once 'swift/lib/swift_required.php';

	$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
	  ->setUsername('corq.org')
	  ->setPassword('wearecorq');

	$mailer = Swift_Mailer::newInstance($transport);

	$message = Swift_Message::newInstance('Verify Your Account')
	  ->setFrom(array('corq.org@gmail.com' => 'Corq.org'))
	  ->setTo(array($email))
	  ->setBody('Here is your confirmation code: '.$confirmLink);

	$result = $mailer->send($message);	
}

function sendPasswordResetMail($uName, $tempPassword)
{
	require_once 'swift/lib/swift_required.php';
	$email = getEmail($uName);
	$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
	  ->setUsername('corq.org')
	  ->setPassword('wearecorq');

	$mailer = Swift_Mailer::newInstance($transport);

	$message = Swift_Message::newInstance('Password Reset')
	  ->setFrom(array('corq.org@gmail.com' => 'Corq.org'))
	  ->setTo(array($email))
	  ->setBody('Here is your temporary password: '.$tempPassword);

	$result = $mailer->send($message);	
}

function confirmUser ($uname, $confirm_key)
{
global $con;
$query="SELECT * FROM userInfo WHERE confirmkey ='$confirm_key' AND username='$uname'";
$resultExist= mysqli_query($con,$query);
if($resultExist){
$count = mysqli_num_rows($resultExist);
if($count==1){
$verified = '1';
$queryUpdate="UPDATE userInfo SET verified = '$verified', confirmkey = 'NULL'  WHERE confirmkey = '$confirm_key'";
$result = mysqli_query ($con,$queryUpdate);
if ($result)
{
echo 'Account is now confirmed';
}
else {
echo 'The data not updated';
}
}
else {
echo ' The confirm key exist more than once, Contact the admin ';
}
}
else {
echo ' cant find a user with this confirmation code ';
}
}
function checkVerified($username)
{
global $con;
$query = "SELECT verified FROM userInfo WHERE username = '$username'";
$result = mysqli_query ($con,$query);
$resultArray = mysqli_fetch_array($result);
$verify = $resultArray[0];
return $verify;
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
function setTempPassword($username, $tempPassword) {
	global $con;		    
	$hPassword = $hash = password_hash($tempPassword, PASSWORD_DEFAULT);
	mysqli_query($con,"Update userInfo Set password='$hPassword' WHERE username='$username';");
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
    $query = "
		select restaurant_indicator from pin 
		join pinned_on on pin.pin_id = pinned_on.pin_id 
		where pinned_on.board_id = '$board_id';";
		$result = $con->query($query);
		$resultArray = array();
		while ($row = $result->fetch_assoc()) {
			$resultArray[] = $row[restaurant_indicator];
		}
		return $resultArray;
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
	return $pinId;
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
	
	$query = "select pin_id from pinned_on WHERE board_id='$board_id'";
		$result = $con->query($query);
		$resultArray = array();
		while ($row = $result->fetch_assoc()) {
			$resultArray[] = $row[pin_id];
		}
		return $resultArray;
}
function getPinLinks($board_id) {
	global $con;
	$query = "select img_link, pin.pin_id from pin, pinned_on 
			where pinned_on.board_id = '$board_id' AND pinned_on.pin_id = pin.pin_id
			ORDER BY pin.pin_id;";
	$result = $con->query($query);
	$resultArray = array();
	while ($row = $result->fetch_assoc()) {
		$resultArray[] = $row[img_link];
	}
	return $resultArray;
}
// Gets board IDs
function getBoardByUser($user)
{
	global $con;
	$query = "select board_id from board WHERE owner='$user';";
	$result = $con->query($query);
	$resultArray = array();
	while ($row = $result->fetch_assoc()) {
		$resultArray[] = $row[board_id];
	}
	return $resultArray;
}
// Get board names.
function getBoardNames($user)
{
	global $con;
	$query = "	select board_name
				from board
				where owner = '$user';";
				$result = $con->query($query);
				$resultArray = array();
				while ($row = $result->fetch_assoc()) {
					$resultArray[] = $row[board_name];
				}
				return $resultArray;
}
	/*			
	$result = mysqli_query($con, $query);
	//$resultArray = mysqli_fetch_array($result);
	$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	$outputArray = array();
	for($x=0; $x<sizeof($resultArray);$x++)
	{
		array_push($outputArray, $resultArray[$x][0]);
	}
	return $outputArray;
	*/
	//}
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
		
	//$result = mysqli_query($con, $query);
	//$resultArray = mysqli_fetch_all($result, MYSQLI_NUM);
	//return sizeof($resultArray);
		$result = $con->query($query);
		$resultArray = array();
		while ($row = $result->fetch_assoc()) {
			$resultArray[] = $row;
		}
		return count($resultArray);
}
function getDescriptionOfPins($user)
{
	global $con;
	$query = "
		select description
		from pin
		where owner = '$user';";
		$result = $con->query($query);
		$resultArray = array();
		while ($row = $result->fetch_assoc()) {
			$resultArray[] = $row[description];
		}
		return $resultArray;
}
function getNamesOfPins($user)
{
	global $con;
	$query = "
		select name
		from pin
		where owner = '$user';";
		$result = $con->query($query);
		$resultArray = array();
		while ($row = $result->fetch_assoc()) {
			$resultArray[] = $row[name];
		}
		return $resultArray;
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
			$result = $con->query($query);
			$resultArray = array();
			while ($row = $result->fetch_assoc()) {
				$resultArray[] = $row[name];
			}
			return $resultArray;
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
			$result = $con->query($query);
			$resultArray = array();
			while ($row = $result->fetch_assoc()) {
				$resultArray[] = $row[description];
			}
			return $resultArray;
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
		$result = $con->query($query);
		$resultArray = array();
		while ($row = $result->fetch_assoc()) {
			$resultArray[] = $row[pin_id];
		}
		return $resultArray;
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
		$result = $con->query($query);
		$resultArray = array();
		while ($row = $result->fetch_assoc()) {
			$resultArray[] = $row[followUser];
		}
		return $resultArray;
}
function getSecurityQuestion($username) {
    global $con;
    $result = mysqli_query($con, "SELECT security_question FROM userInfo WHERE username='$username'");
    $row=mysqli_fetch_array($result,MYSQLI_NUM);
	return $row[0]; 
}
function validateSecurityAnswer($securityanswer, $uName) {
    global $con;
    $result = mysqli_query($con, "SELECT security_answer FROM userInfo WHERE username='$uName'");
    $row=mysqli_fetch_array($result,MYSQLI_NUM); 
    if ($row[0]== $securityanswer) {
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
		$result = $con->query($query);
		$resultArray = array();
		while ($row = $result->fetch_assoc()) {
			$resultArray[] = $row[comment_content];
		}
		return $resultArray;
}
function getCommentAuthors($pin_id) {
	global $con;
	$query = "
		SELECT author
		FROM comments
		WHERE pin_id = '$pin_id';";
		$result = $con->query($query);
		$resultArray = array();
		while ($row = $result->fetch_assoc()) {
			$resultArray[] = $row[author];
		}
		return $resultArray;
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
function checkPrivacy($board_id)
{
	global $con;
	
	$query = "
			select private
			from board
			where board_id = $board_id;";
	$result = mysqli_query($con, $query);
	$resultArray = mysqli_fetch_array($result);
	return $resultArray[0];
	
}
function togglePrivacy($board_id)
{
	global $con;
	
	if(checkPrivacy($board_id))
	{
		$query = "
				update board set private=0
				where board_id = $board_id;";
	}
	
	else
	{
		$query = "
				update board set private=1
				where board_id = $board_id;";
	}
	//print($query);
	$result = mysqli_query($con, $query);
	return $result;
}
function changePrivacy($board_name, $privacy)
{
	global $con;
	
	
		$query = "
				update board set private=$privacy
				where board_name = '$board_name';";
	$result = mysqli_query($con, $query);
	return $result;
}
/*
 * ADD NEW DATABASE/QUERY FUNCTIONS HERE.
 */
?>