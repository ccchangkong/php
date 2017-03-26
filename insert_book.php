<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>book entry results</title>
</head>
<body>
<h1>book entry results</h1>
<?php
$isbn = $_POST['isbn'];
$author = $_POST['author'];
$title = $_POST['title'];
$price = $_POST['price'];

if (!$isbn || !$author || !$title || !$price) {
	echo "error";
	exit;
}
if (!get_magic_quotes_gpc()) {
	$isbn = addslashes($isbn);
	$author = addslashes($author);
	$title = addslashes($title);
	$price = addslashes($price);
}
@$db = new mysqli('localhost', 'bookorama', 'bookorama123', 'books');
if (mysqli_connect_errno()) {
	echo "can not connect to dadabase";
	exit;
}
$query = "insert into books values ('" . $isbn . "','" . $author . "','" . $title . "','" . $price . "')";
$result = $db->query($query);

if ($result) {
	echo $db->affected_rows . " book inserted into database.";
} else {
	echo "not added.";
}

$db->close();
?>
</body>
</html>
