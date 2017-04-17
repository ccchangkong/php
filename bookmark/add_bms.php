<?php
require_once 'bookmark_fns.php';
session_start();

$new_url = $_POST['new_url'];
do_html_header('add bookmarks');
try {
	check_valid_user();
	if (!filled_out($_POST)) {
		throw new Exception('form not completely filled out', 1);

	}
	if (strstr($new_url, 'http://') === false) {
		$new_url = 'http://' . $new_url;
	}
	if (!(@fopen($new_url, 'r'))) {
		throw new Exception('not a valid url', 1);

	}
	add_bm($new_url);
	echo "bookmark added";
	if ($url_array = get_uesr_urls($_SESSION['valid_user'])) {
		display_user_urls($url_array);
	}
} catch (Exception $e) {
	echo $e->getMessage();
}
display_user_menu();
do_html_footer();
?>