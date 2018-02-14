<?php

// set the current time zone
date_default_timezone_set("America/New_York");

// get the current date and time
$now = new DateTime();

// dates can be output using different formats: http://php.net/manual/en/function.date.php
echo "<h3> Current date and time: </h3>" ;

echo $now->format('Y-m-d H:i:sP') . "<br>";
echo $now->format('Y-m-d')  . "<br>";
echo $now->format('l M j, Y')  . "<br>";

// get the time portion of the date
$time1 = $now->format("H:i:s");

echo "<h3>Current time: </h3>";
echo $time1;

// make a new DateTime object
$str = "6:45 AM";
$futureDate = new DateTime($str);

echo "<h3> Some Other Time: </h3>";
echo $futureDate->format("H:i:s");

// compare two times

$diff = date_diff($now, $futureDate);

echo "<h3> Time Difference: </h3>";
echo $diff->format("%h hours %i minutes");;

?>