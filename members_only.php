<?php
session_start();
if (isset($_SESSION['valid_user'])) {
	echo "<p>you are logger in as " . $_SESSION['valid_user'] . "</p>";
	echo "<p>members only content goes here</p>";
} else {
	echo "<p>you are not logged in</p>";
	echo "<p>only logged in members may see this page</p>";
}
echo '<a href="authmain.php">back to main page</a>';
?>