<?php
include 'book_sc_fns.php';
session_start();

$catid = $_GET['catid'];
$name = get_category_name($catid);

do_html_header($name);

$book_array = get_books($catid);
display_books($book_array);

if (isset($_SESSION['admin_user'])) {
	display_button("index.php", 'continue', 'continue shopping');
	display_button('admin.php', 'admin-menu', 'admin menu');
	display_button("edit_category_form.php?catid=" . $catid, 'edit-category', 'edit category');
} else {
	display_button('index.php', 'continue-shopping', 'continue shopping');
}
do_html_footer();
?>