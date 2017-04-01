<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>site submission results</title>
</head>
<body>
	<h1>site submission results</h1>
	<?php
$url = $_REQUEST['url'];
$email = $_REQUEST['email'];
$url = parse_url($url);
$host = $url['host'];
if (!($ip = gethostbyname($host))) {
	echo "host for url does not have valid ip";
	exit;
}
echo "host is at ip $ip <br>";

$email = explode('@', $email);
$emailhost = $email[1];

if (!dns_get_mx($emailhost, $mxhostsarr)) {
	echo "email address is not at valid host";
	exit;
}
echo "email is delivered via";
foreach ($mxhostsarr as $$mx) {
	echo "$mx";
	echo "<br> all submitted details are ok<br>";
	echo "thank you for submitting your site.<br>it will be visited by one of our staff members soon";
}
?>
</body>
</html>
