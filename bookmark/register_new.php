<?php
require_once 'bookmark_fns.php';

$email = $_POST['email'];
$username = $_POST['username'];
$passwd = $_POST['passwd'];
$passwd2 = $_POST['passwd2'];

session_start();
try {
	if (!filled_out($_POST)) {
		throw new Exception('you have not flled the form', 1);

	}
	if (!valid_email($email)) {
		throw new Exception('the e-mailnot match', 1);

	}
	if ($passwd != $passwd2) {
		throw new Exception('the passwd not match', 1);

	}
	if ((strlen($passwd) < 6) || (strlen($passwd > 16))) {
		throw new Exception('you password need between 6 and 15 char', 1);

	}
	register($username, $email, $passwd);
	$_SESSION['valid_user'] = $username;

	do_html_header('registration successful!');
	echo "your registration was successful";
	do_html_url('member.php', 'go to members page');
	do_html_footer();
} catch (Exception $e) {
	do_html_header('problem');
	echo $e->getMessage();
	do_html_footer();
	exit;
}
?>