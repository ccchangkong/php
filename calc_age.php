<?php
$day = 19;
$month = 9;
$year = 1003;

$bdayunix = mktime(0, 0, 0, $month, $day, $year);
$nowunix = time();
$ageunix = $nowunix - $bdayunix;
$age = floor($ageunix / (365 * 24 * 60 * 60));
echo "age is $age";
?>
