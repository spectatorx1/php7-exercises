<?php

function dayOfWeek($day, $month, $year) {
    $time = mktime(0, 0, 0, $month, $day, $year);
    $dayOfWeek = date("w", $time);

    switch ($dayOfWeek) {
        case 0 : $dayOfWeek = "sunday";
            break;
        case 1 : $dayOfWeek = "monday";
            break;
        case 2 : $dayOfWeek = "tuesday";
            break;
        case 3 : $dayOfWeek = "wednesday";
            break;
        case 4 : $dayOfWeek = "thursday";
            break;
        case 5 : $dayOfWeek = "friday";
            break;
        case 6 : $dayOfWeek = "saturday";
            break;
    }
    return $dayOfWeek;
}

$dateDay = dayOfWeek(12, 1, 2018);

echo "January 12th 2018 is $dateDay.";