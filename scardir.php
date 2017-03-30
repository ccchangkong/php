<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>browse</title>
</head>
<body>
	<h1>browse</h1>
<?php
$dir = './uploads/';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

echo "<p>upload directory is $dir</p>";
echo "<p>directory listing:</p>";
echo "<ul>";
foreach ($files1 as $file) {
	if ($file != "." && $file != '..') {
		echo "<li>$file</li>";
	}
}
echo "</ul>";

echo "<p>upload directory is $dir</p>";
echo "<p>directory listing2:</p>";
echo "<ul>";
foreach ($files2 as $file) {
	if ($file != "." && $file != '..') {
		echo "<li>$file</li>";
	}
}
echo "</ul>";
?>
</body>
</html>