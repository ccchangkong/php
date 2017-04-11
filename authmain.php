<?php
session_start();
if (isset($_POST['userid']) && isset($_POST['password'])) {
	$userid = $_POST['userid'];
	$password = $_POST['password'];
	$db_conn = new mysqli('localhost', 'webauth', 'webauth', 'auth');
	if (mysqli_connect_errno()) {
		echo 'connection to database faild:' . mysqli_connect_error();
		exit();
	}
	$query = 'select * from authorized_users ' . "where name='$userid'" . "and password=sha1('$password')";
	$result = $db_conn->query($query);
	if ($result->num_rows > 0) {
		$_SESSION['valid_user'] = $userid;

	}
	$db_conn->close();
}
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Document</title>
  </head>

  <body>
    <h1>home page</h1>
    <?php
if (isset($_SESSION['valid_user'])) {
	echo "ou are logged in as: " . $_SESSION['valid_user'] . '<br>';
	echo '<a href="logout.php">log out</a><br>';
} else {
	if (isset($userid)) {
		echo "could not log you in.<br>";
	} else {
		echo "you are not log in.<br>";
	}
	echo '<form action="authmain.php" method="post"><input type="text" name="userid" placeholder="userid"><input type="password" name="password"><br><input type="submit" value="log in"></form><br>';
}
?>
      <a href="members_only.php">members section</a>
  </body>

  </html>
