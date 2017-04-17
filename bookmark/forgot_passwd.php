<?php
require_once 'bookmark_fns.php';
do_html_header('resetting passwd');

$username = $_POST['username'];

try {
	$passwd = reset_password($username);
	notify_password($username, $password);
	echo "you new password has been emailed to you";
} catch (Exception $e) {
	echo "you password could not be reset";
}
do_html_url('login.php', 'login');
do_html_footer();
?>