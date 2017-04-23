<?php
include 'book_sc_fns.php';
session_start();
do_html_header('checkout');
if (($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
	display_cart($_SESSION['cart'], false, 0);
	display_checkout_form();
} else {
	echo "<p>there are no items in your </p>";
}
display_button('show_cart.php', 'continue-shopping', 'continue shopping');
do_html_footer();
?>
