<?php
require_once 'book_sc_fns.php';
session_start();
if (($_POST['username']) && ($_POST['passwd'])) {
	$username = $_POST['username'];
	$passwd = $_POST['passwd'];
	if (login($username, $passwd)) {
		$_SESSION['admin_user'] = $username;
	} else {
		do_html_header('problem:');
		echo "<p>you could not be logged in.</p>";
		do_html_url('login.php', 'login');
		do_html_footer();
		exit;
	}
}
do_html_header('administration');
if (check_admin_user()) {
	display_admin_menu()
}else{
	echo "<p>you are not authorized to enter the administration area</p>";
}
do_html_footer();
?>
