<?php
function db_connect() {
	$result = new mysqli('localhost', 'bm_user', 'password', 'bookmarks');
	if (!$result) {
		throw new Exception('could not connect to database server');
	} else {
		return $result;
	}
}
?>