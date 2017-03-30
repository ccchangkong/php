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
$file = basename($file);

echo "<h1>file:" . $file . "</h1>";
echo "file last accessed:" . date('J F Y H:i', fileatime($file)) . "<br>";
echo "file last modified:" . date('J F Y H:i', filemtime($file)) . "<br>";

$user = posix_getpwuid(fileowner($file));
echo "file owner:" . $user['name'] . "<br>";

$group = posix_getgrgid(filegroup($file));
echo "file group:" . $group['name'] . "<br>";

echo "file permissions:" . decoct(fileperms($file)) . "<br>";

echo "file type" . filetype($file) . "<br>";
echo "file size" . filesize($file) . "<br>";

echo "<h2>file tests</h2>";
echo "is_dir:" . (is_dir($file) ? 'true' : 'false') . "<br>";
echo "is_executable:" . (is_executable($file) ? 'true' : 'false') . "<br>";
echo "is_file:" . (is_file($file) ? 'true' : 'false') . "<br>";
echo "is_link:" . (is_link($file) ? 'true' : 'false') . "<br>";
echo "is_readable:" . (is_readable($file) ? 'true' : 'false') . "<br>";
echo "is_writable:" . (is_writable($file) ? 'true' : 'false') . "<br>";
?>
</body>
</html>
