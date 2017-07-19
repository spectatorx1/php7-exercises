<?php

$now = time();

$dayOfWeek = date("w", $now);

switch ($dayOfWeek) {
    case 0 : $dayOfWeek = "niedziela";
        break;
    case 1 : $dayOfWeek = "poniedziałek";
        break;
    case 2 : $dayOfWeek = "wtorek";
        break;
    case 3 : $dayOfWeek = "środa";
        break;
    case 4 : $dayOfWeek = "czwartek";
        break;
    case 5 : $dayOfWeek = "piątek";
        break;
    case 6 : $dayOfWeek = "sobota";
        break;
}

$date = date("Y-m-d", $now);
$time = date("h:i:s a", $now);
$gmt = date("O", $now);

echo "Today is $dayOfWeek, $date, $time, $gmt GMT.";
