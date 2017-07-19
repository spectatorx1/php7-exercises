<?php

$dataSet = array("abc", 1, 2, 8, "def", "gh", 9, "j", 154, "lk");

$arr1 = array();
$arr2 = array();

foreach ($dataSet as $val) {
    if (is_int($val) || is_double($val)) {
        $arr1[] = $val;
    } else if (is_string($val)) {
        $arr2[] = $val;
    }
}

foreach ($arr1 as $val) {
    echo "$val  ";
}
echo ("<br>");
foreach ($arr2 as $val) {
    echo "$val  ";
}