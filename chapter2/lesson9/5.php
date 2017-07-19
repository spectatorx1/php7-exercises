<?php

function sortStrings($e1, $e2) {
    return strcmp($e2, $e1);
}

$dataSet = array("abc", "Abc", "Def", "def", "Egh", "egh", "Ijk", "ijk", "opr", "Opr");

echo("Contents of array before sort: <br>");
foreach ($dataSet as $val) {
    echo "$val ";
}
echo("<br>");

usort($dataSet, 'sortStrings');

echo("Contents of array after sort: <br>");
foreach ($dataSet as $val) {
    echo "$val ";
}