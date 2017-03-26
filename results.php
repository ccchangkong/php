<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>results</title>
</head>
<body>
	<h1>results</h1>
	<?php
$searchtype = $_POST['searchtype'];
$searchterm = trim($_POST['searchterm']);
if (!$searchtype || !$searchterm) {
	echo "error";
	exit;
}
if (!get_magic_quotes_gpc()) {
	$searchtype = addslashes($searchtype);
	$searchterm = addslashes($searchterm);
}
$db = new mysqli('localhost', 'bookorama', 'bookorama123', 'books');
// $db = new mysqli('localhost', 'root', '', 'books');
if (mysqli_connect_errno()) {
	echo "can not connect to dadabase";
	exit;
}
$query = "select * from books where " . $searchtype . " like '%" . $searchterm . "%'";
$result = $db->query($query);

$num_results = $result->num_rows;
echo "<p>num:" . $num_results . "</p>";
for ($i = 0; $i < $num_results; $i++) {
	$row = $result->fetch_assoc();
	echo "<p>" . ($i + 1) . ". title: " . htmlspecialchars(stripslashes($row['title'])) . "</p>";
	echo "<p>author:" . stripslashes($row['author']) . "</p>";
	echo "<p>isbn:" . stripslashes($row['isbn']) . "</p>";
	echo "<p>price:" . stripslashes($row['price']) . "</p>";
}
$result->free();
$db->close();
?>
</body>
</html>
