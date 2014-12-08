<?php 
    session_start(); 
    include 'actions.php';
    // If user is not logged in, redirect it
    if (!(isset($_SESSION['username']))) {
        header("location:index.php"); //to redirect back to "index.php" after logging out
        exit();
    }
	
	if (isset($_GET['term'])) {
		$boardName = $_GET['term'];
		if (checkBoardExists('admin', $boardName) == 0) {
			addBoard('admin', $boardName);
			$board_id = getBoardID('admin', $boardName);
			$pinHits = searchForPin($_GET['term']);
			$max = 20;
			if (count($pinHits) < 20) {
				$max = count($pinHits);
			}
			for ($i = 0; $i < $max; $i++) {
				repin($pinHits[$i], $board_id);
			}
		}
		$board_id = getBoardID('admin', $boardName);
		header("location:boards.php?board=".$board_id);
	}		
?>
