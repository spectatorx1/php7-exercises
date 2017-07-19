<?php

$ip = $_SERVER['REMOTE_ADDR'];

if (($ips = file("./ips1.txt", FILE_IGNORE_NEW_LINES)) && in_array($ip, $ips)) {
    include "./incl1.php";
} else if (($ips = file("./ips2.txt", FILE_IGNORE_NEW_LINES)) && in_array($ip, $ips)) {
    include "./incl2.php";
} else if (($ips = file("./ips3.txt", FILE_IGNORE_NEW_LINES)) && in_array($ip, $ips)) {
    include "./incl3.php";
} else {
    include "./incl0.php";
}