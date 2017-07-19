<?php

$arr = file("./ips.txt");

foreach ($arr as $val) {
    if (trim($val) == $_SERVER['REMOTE_ADDR']) {
        include "index1.php";
        exit();
    }
}
include "index2.php";