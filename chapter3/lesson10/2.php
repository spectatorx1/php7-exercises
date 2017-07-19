<?php

$dir = "./";
if (!($fd = opendir($dir))) {
    exit("Can't open directory $dir!");
}

$arr = array();

while (($file = readdir($fd)) !== false) {
    $arr[] = $file;
}

sort($arr);
closedir($fd);

foreach ($arr as $val) {
    echo "$val<br>";
}