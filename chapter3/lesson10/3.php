<?php

$dir = "./";

$arr = scandir($dir);
$dirs = array();
$files = array();

foreach ($arr as $val) {
    if (is_dir($dir . $val)) {
        $dirs[] = $val;
    } else if (is_file($dir . $val)) {
        $files[] = $val;
    }
}

echo "<strong>Directories</strong><br>";
foreach ($dirs as $val) {
    echo "$val<br>";
}

echo "<br><strong>Files</strong><br>";
foreach ($files as $val) {
    echo "$val<br>";
}