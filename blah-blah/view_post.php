<?php
include 'include_fns.php';
$postid = $_GET['postid'];

$post = get_post($postid);
do_html_header($post['title']);
display_post($post);
if ($post['children']) {
	echo "<br>";
	display_replies_line();
	display_tree($_SESSION['expanded'], 0, $postid);
}
do_html_footer();
// 623
?>