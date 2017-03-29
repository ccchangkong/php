<?php
$name = $_POST['name'];
$password = $_POST['password'];

if ((!isset($name)) || (!isset($password))) {

	?>
  <h1>log in</h1>
  <form action="post" action="secretdb.php">
    <ul>
      <li>
        <label for="name">name</label>
        <input type="text" name="name">
      </li>
      <li>
        <label for="password">pw</label>
        <input type="password" name="password">
      </li>
    </ul>
  </form>
<?php
} else {
	$mysql = mysqli_connect('localhost', 'webauth', 'webauth');
	if ($mysql) {
		echo "cannot connect to database";
		exit;
	}

	$selected = mysqli_select_db($mysql, 'auth');
	if (!$selected) {
		echo "cannot select database";
		exit;
	}

	$query = "select count(*) from authorized_users where name='" . $name . "' and password=sha1('" . $password . "')";
	$result = mysqli_query($mysql, $query);
	if (!$result) {
		echo "cannot run query";
		exit;
	}
	$row = mysqli_fetch_row($result);
	$count = $row[0];
	if ($count > 0) {
		echo "success";
	} else {
		echo "go away";
	}
}
?>
