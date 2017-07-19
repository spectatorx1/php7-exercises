<?php

$arr = file("./test.txt");

if (!$fd = fopen("./test.txt", 'wb')) {
    echo("Can't open a file test.txt");
} else {
    $ile = count($arr);
    for ($i = $ile - 1; $i >= 0; $i--) {
        fwrite($fd, $arr[$i]);
    }
}
fclose($fd);