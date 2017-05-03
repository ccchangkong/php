<?php
include 'include_fns.php';
$title = $_POST['title'];
$poster = $_POST['poster'];
$message = $_POST['message'];
if (isset($_GET['parent'])) {
	$parent = $_GET['parent'];
	# code...
} else {
	$parent = $_POST['parent'];
}
if (!$area) {
	$arer = 1;
}
if (!$error) {
	if (!$parent) {
		$parent = 0;
		if (!$title) {
			$title = 'new post';
		}
	} else {
		$title = get_post_title($parent);
		if (strstr($title, 're: ') == false) {
			$title = 're: ' . $title;
		}
		$title = substr($title, 0, 20);
		$message = add_quoting(get_post_message($parent));
	}
}
do_html_header($title);
display_new_post_form($parent, $area, $title, $message, $poster);
if ($error) {
	echo "you msg was not stored";
}
do_html_footer();
?>
