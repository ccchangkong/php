<?php
include 'book_sc_fns.php';
session_start();
$isbn = $_GET['isbn'];
// 505
$book = get_book_details($isbn);
do_html_header($book['title']);
display_book_details($book);

$target = 'index.php';
if ($book['catid']) {
	$target = "show_cat.php?catid=" . $book['catid'];
}
if (check_admin_user()) {
	display_button("edit_book_form.php=" . $isbn, 'edit-item', 'edit item');
	display_button('admin.php', 'admin-menu', 'admin menu');
	display_button($target, 'continue', 'continue');
} else {
	display_button("show_cart.php?new=" . $isbn . "add-to-cart", 'add' . $book['title'] . "to my shopping cart");
	display_button($target, 'continue-shopping', 'continue shopping');
}
do_html_footer();
?>