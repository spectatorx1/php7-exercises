<?php

function sortNum($e1, $e2) {
    if ($e1 % 3 == 0) {
        if ($e2 % 3 == 0) {
            return $e2 - $e1;
        } else {
            return -1;
        }
    } else {
        if ($e2 % 3 == 0) {
            return 1;
        } else {
            return $e1 - $e2;
        }
    }
}

$dataSet1 = array(5, 7, 3, 1, 8, 2, 0, 4, 9, 6);

echo "Contents of array before sort: <br>";
foreach ($dataSet1 as $val) {
    echo "$val ";
}
echo "<br>";

usort($dataSet1, 'sortNum');

echo "Contents of array after sort: <br>";
foreach ($dataSet1 as $val) {
    echo "$val ";
}