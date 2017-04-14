<?php
require_once 'db_fns.php';
function register($username, $email, $password) {
	$conn = db_connect();
	$result = $conn->query("select * from user where username='" . $username . "'");
	if (!$result) {
		throw new Exception('could not excute query');
	}
	if ($result->num_rows > 0) {
		throw new Exception('that username is taken');
	}
	$result = $conn->query("insert into user values ('" . $username . "',sha1('" . $password . "'),'" . $email . "')");
	if (!$result) {
		throw new Exception('could not register you in database');
	}
	return true;
}
?>