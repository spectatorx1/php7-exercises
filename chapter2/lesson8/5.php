<?php

//case-insensitive variant
function entCountInsensitive($where, $what) {
    $pos = 0;
    $count = 0;
    while (($pos = stripos($where, $what, $pos)) !== false) {
        $count++;
        $pos++;
    }
    return $count;
}

echo entCountInsensitive("Retrospection of retro clock and retro style", "retro") . "<br>";

//case-sensitive variant
function entCountSensitive($where, $what) {
    $pos = 0;
    $count = 0;
    while (($pos = strpos($where, $what, $pos)) !== false) {
        $count++;
        $pos++;
    }
    return $count;
}

echo entCountSensitive("Retrospection of retro clock and retro style", "retro");