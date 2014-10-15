<?php

/* 
 * Various user actions.
 */

// Imports database queries.
include 'queries.php';

function postPin() {

	$user = $_SESSION('username');
	$board = $_POST('current_board');
	$name = $_POST('pin_name');
	$desc = $_POST('pin_description');
	$path = $_POST('pin_path');

	if ($owner == null || $board == null || $name == null || $desc == null)
		return false;

	// Run the query to add a pinterest
	return add_pin($owner, $board, $name, $desc, $path);
}

/** 
 * Remove a pin. User refers to the owner of the board on which the pin is pinned, so that
 * the query can remove the pin from all other boards if this is the owner of that pin.
 */
function deletePin() {
	
	$user = $_SESSION('username');
	$pin_id = $_POST('pin_id');

	if ($user == null || $pin_id == null)
		return false;

	return remove_pin($user, $pin_id);
}


?>