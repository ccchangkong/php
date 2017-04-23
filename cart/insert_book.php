<?php
require_once 'book_sc_fns.php';
session_start();
do_html_header('adding a book');
if (check_admin_user()) {
	if (filled_out($_POST)) {
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$catid = $_POST['catid'];
		$price = $_POST['price'];
		$description = $_POST['description'];

		if (insert_book($isbn, $title, $author, $catid, $price, $description)) {
			echo stripcslashes($title) . " was added";
		} else {
			stripcslashes($title) . " could not be added";
		}
	} else {
		echo "<p>you have not filled out the form.please try again</p>";
	}
	do_html_url('admin.php', 'back to administration menu');
} else {
	echo "<p>you are not authorised to view this page</p>";
}
do_html_footer();
?>
