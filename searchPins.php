<?php 
    session_start(); 
    include 'actions.php';
    // If user is not logged in, redirect it
    if (!(isset($_SESSION['username']))) {
        header("location:index.php"); //to redirect back to "index.php" after logging out
        exit();
    }
	
	if (isset($_GET['term'])) {
		if (checkBoardExists($uName, $boardName) == 0) {
			addBoard($user, $name);
			$pinHits = searchForPin($searchTerm);
			for ($i = 0; $i < count($pinHits); $i++) {
				repin($pinHits[$i], $board_id);
			}
		}
		$board_id = getBoardID($uName, $boardName);
		header("location:boards?board=".$board_id.".php");
	}		
?>
