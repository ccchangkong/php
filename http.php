<?php
if ((substr($_SERVER['SERVER_SOFTWARE'], 0, 9) == 'Microsoft') && (!isset($_SERVER['PHP_AUTH_USER'])) && (!isset($_SERVER['PHP_AUTH_PW'])) && (substr($_SERVER['HTTP_AUTHORIZATION'], 0, 6) == 'Basic')) {
	list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':', base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 9)));
}

if (($_SERVER['PHP_AUTH_USER'] != 'user') || ($_SERVER['PHP_AUTH_PW']) != 'pass') {
	header('WWW-Authenticate:Basic realm="Realm-Name"');
	if (substr($_SERVER['SERVER_SOFTWARE'], 0, 9) == 'Microsoft') {
		header('Status:401 Unauthorized');
	} else {
		header('HTTP/1.0 401 Unauthorized');
	}
	echo "<h1>go away</h1>";
} else {
	echo "<h1>hello!</h1>";
}
?>
