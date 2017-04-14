<?php
require_once 'bookmark_fns.php';
session_start();

$username = $_POST['username'];
$passwd = $_POST['passwd'];

if ($username && $passwd) {
	try {
		login($username, $passwd);
		$_SESSION['valid_user'] = $username;
	} catch (Exception $e) {
		do_html_header('problem');
		echo "you could not be logged in";
		do_html_url('login.php', 'login');
		do_html_footer();
		exit;
	}
}
do_html_header('home');
check_valid_user();
if ($url_array = get_user_urls($_SESSION['valid_user'])) {
	display_user_urls($url_array);
}
display_user_menu();
do_html_footer();
?>