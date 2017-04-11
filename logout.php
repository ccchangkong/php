<?php

session_start();
$old_user = $_SESSION['valid_user'];
unset($_SESSION['valid_user']);
session_destroy();
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>log out</title>
 </head>
 <body>
 	<h1>log out</h1>
 	<?php
if (!empty($old_user)) {
	echo "logged out";
	# code...
} else {
	echo "you were not lodded in ,and so have not been loggend out<br>";
}
?>
 	 <a href="authmain.php">back to main page</a>
 </body>
 </html>