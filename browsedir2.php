<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>browse</title>
</head>
<body>
	<h1>browse</h1>
<?php
$dir = dir('./uploads/');

echo "<p>upload directory is $dir->path</p>";
echo "<p>directory listing:</p>";
echo "<ul>";
while (false !== ($file = $dir->read())) {
	if ($file != "." && $file != '..') {
		echo "<li>$file</li>";
	}
}
echo "</ul>";
$dir->close();
?>
</body>
</html>