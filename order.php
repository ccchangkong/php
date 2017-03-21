<?php
require_once 'error.php';

$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>order</title>
</head>
<body>
<h2>oredr results</h2>
<?php
$date = date('H:i, jS f');
echo "<p>time" . $date . "</p>";
echo "<p>pay:</p>";
$totalqty = 0;
$totalqty = $a + $b + $c;
echo "items: " . $totalqty . "<br />";
if ($totalqty == 0) {
	echo "nothing";
} else {
	if ($a > 0) {
		echo "a: " . $a;
	}
	if ($b > 0) {
		echo "b: " . $b;
	}
	if ($c > 0) {
		echo "c: " . $c;
	}
}
$totalamount = 0.00;
define('ASS', 10);
define('BSS', 100);
define('CSS', 33);
$totalamount = $a * ASS + $b * BSS + $c * CSS;
$totalamount = number_format($totalamount, 2, '.', ' ');
echo "total: " . $totalamount;

try {
	if (!($fp = @fopen('$DOCUMENT_ROOT/php/demo.txt', 'ab'))) {
		throw new fileOpenEx;
	}
	if (!flock($fp, LOCK_EX)) {
		throw new fileLockEx;
	}
	if (!fwrite($fp, $outputstring, strlen($outputstring))) {
		throw new fileWriteEx;
	}
	flock($fp, LOCK_UN);
	fclose($fp);
	echo "order written";
} catch (fileOpenEx $e) {
	echo "not open";
} catch (Exception $e) {
	echo "error";
}
?>
</body>
</html>
