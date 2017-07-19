<?php

function daysTo($day, $month, $year) {
    $time1 = mktime(0, 0, 0, $month, $day, $year);
    $time2 = time();
    $time = $time1 - $time2;
    return ceil($time / 86400);
}

$year = date("Y");
$days = daysTo(31, 12, $year);

echo "To the end of current year left $days days.";
