<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>browse</title>
</head>
<body>
	<h1>browse</h1>
<?php
$current_dir = './uploads/';
$dir = opendir($current_dir);

echo "<p>upload directory is $current_dir</p>";
echo "<p>directory listing:</p>";
echo "<ul>";
while (false !== ($file = readdir($dir))) {
	if ($file != "." && $file != '..') {
		echo "<li>$file</li>";
	}
}
echo "</ul>";
closedir($dir);
?>
</body>
</html>