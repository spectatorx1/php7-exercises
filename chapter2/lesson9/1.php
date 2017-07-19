<?php

$dataSet = array(1, 2, 5, 123, 56, 23, 90, 79, 73, 75, 112, 114, 115, 251, 337);

$even = 0;
$odd = 0;

for ($i = 0; $i < count($dataSet); $i++) {
    if ($dataSet[$i] % 2 == 0) {
        $even++;
    } else {
        $odd++;
    }
}

echo "Even: $even, odd: $odd";