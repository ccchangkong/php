<?php
require_once 'bookmark_fns.php';
session_start();
do_html_header('changing passwd');

$old_passwd = $_POST['old_passwd'];
$new_passwd = $_POST['new_passwd'];
$new_passwd2 = $_POST['new_passwd2'];

try {
	check_valid_user();
	if (!filled_out($_POST)) {
		throw new Exception('you are not filled out the form completely', 1);
	}
	if ($new_passwd != $new_passwd2) {
		throw new Exception('passwd not change', 1);
	}
	if ((strlen($new_passwd) > 16) || (strlen($new_passwd) < 6)) {
		throw new Exception('new passwd need 6 and 16 char', 1);

	}
	change_password($_SESSION['valid_user'], $old_passwd, $new_passwd);
	echo "passwd changed.";
} catch (Exception $e) {
	echo $e->getMessage();
}
display_user_menu();
do_html_footer();
?>
