<?php
include 'book_sc_fns.php';
session_start();
do_html_header('checkout');

$name = $_POST['name'];
$address = $_POST['address'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$country = $_POST['country'];

if (($_SESSION['cart']) && ($name) && ($address) && ($city) && ($zip) && ($country)) {
	if (insert_order($_POST) != false) {
		display_cart($_SESSION['cart'], false, 0);
		display_shipping(calculate_shipping_cost());
		display_card_form($name);
		display_button('show_cart.php', 'back', 'back');
	} else {
		echo "<p>could not store data,please try again</p>";
		display_button('checkout.php', 'back', 'back');
	}
} else {
	echo "<p>you did not fill in all the fields,please try again</p>";
	display_button('checkout.php', 'back', 'back');
}
do_html_footer();
?>
