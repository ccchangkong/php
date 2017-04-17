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
	if (!$result) {
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

function reset_password($username) {
	$new_password == get_random_word(6, 13);
	if ($new_password == false) {
		throw new Exception('could not generate new password', 1);
	}
	$rand_number = rand(0, 999);
	$new_password .= $rand_number;

	$conn = db_connect();
	$result = $conn->query("update user set passwd=sha1('" . $new_password . "') where username ='" . $username . "'");
	if (!$result) {
		throw new Exception('could not change passwd', 1);

	} else {
		return $new_password;
	}
}

function get_random_word($min_length, $max_length) {
	$word = '';
	$dirctionary = './english-words.70';
	$fp = @fopen($dirctionary, 'r');
	if (!$fp) {
		return false;
	}
	$size = filesize($dirctionary);

	$rand_localtion = rand(0, $size);
	fseek($fp, $rand_localtion);

	while ((strlen($word) < $min_length) || (strlen($word) > $max_length) || (strstr($word, "'"))) {
		if (feof($fp)) {
			fseek($fp, 0);
		}
		$word = fgets($fp, 80);
		$word = fgets($fp, 80);
	}
	$word = trim($word);
	return $word;
}
function notify_password($username, $password) {
	$conn = db_connect();
	$result = $conn->query("select email from user where username ='" . $username . "'");
	if (!$result) {
		throw new Exception('could not find email address.', 1);

	} elseif ($result->num_rows == 0) {
		throw new Exception('could not find email address.', 1);

	} else {
		$row = $result->fetch_object();
		$email = $row->email;
		$from = "from:support@phpbookmark \r\n";
		$msg = "you password has been changed to" . $password;
		if (mail($email, 'bookmark info', $msg, $from)) {
			return true;
		} else {
			throw new Exception('could not send email', 1);
		}
	}
}
?>

