<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
echo strtok($_SERVER['HTTP_USER_AGENT'], "/");
?>
<?php
// echo date('H:i, j F Y');
// $a = $_POST['a'];
// $b = $_POST['b'];
// $c = $_POST['c'];
// echo 'aa:'.$a.'bb:'.$b.'cc:'.$c.'</br>';
// $total = 0;
// $total = $a+$b+$c;
// echo $total.'</br>';
// $ts = 0;
// define('ASS', 10);
// define('BSS', 100);
// define('CSS', 33);
// $ts = $a*ASS +$b*BSS+$c*CSS;
// echo $ts.gettype($ts);
// echo PHP_VERSION;

// $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
// echo filesize("$DOCUMENT_ROOT/php/demo.txt");

// $name = trim($_POST['name']);
// $email = trim($_POST['email']);
// $feedback = trim($_POST['feedback']);

// $toaddress = 'chlo0o@qq.com';
// $subject = 'hello';

// $mailcontent = "name:" . $name . "\n" .
// 	"email:" . $email . "\n" .
// 	"feedback:" . $feedback . "\n";
// $fromaddress = "from@mail.com";
// mail($toaddress, $subject, $mailcontent, $fromaddress);

?>


</body>
</html>
