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
function login($username, $password) {
	$conn = db_connect();

	$result = $conn->query("select * from user where username ='" . $username . "'and passwd=sha1('" . $password . "')");
	if (!result) {
		throw new Exception('could not log you in', 1);
	}
	if ($result->num_rows > 0) {
		return true;
	} else {
		throw new Exception('could not log you in', 1);
	}
}
function check_valid_user() {
	if (isset($_SESSION['valid_user'])) {
		echo "logged in as " . $_SESSION['valid_user'] . "<br>";
	} else {
		do_html_heading('problem:');
		echo "you are not logged in.<br>";
		do_html_url('login.php', 'login');
		do_html_footer();
		exit;
	}
}

function change_password($username, $old_password, $new_password) {
	login($username, $old_password);
	$conn = db_connect();
	$result = $conn->query("update user set passwd = sha1('" . $new_password . "') where username='" . $username . "'");
	if (!$result) {
		throw new Exception('password could not be changed', 1);

	} else {
		return true;
		// 480
	}
};
?>
