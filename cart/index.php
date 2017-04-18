<?php
include 'book_sc_fns.php';
session_start();
do_html_header('welcome!');
echo "<p>please choose a category:</p>";
$cat_array = get_categories();
display_categories($cat_array);

if (isset($_SESSION['admin_user'])) {
	display_button('admin.php', 'admin-menu', 'admin menu');
}
do_html_footer();
// 502
?>