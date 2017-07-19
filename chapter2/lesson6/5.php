<?php

function lower(int $arg1, int $arg2) {
    if ($arg1 < $arg2) {
        return $arg1;
    } else if ($arg2 < $arg1) {
        return $arg2;
    } else {
        return $var = "Provided values are equal or are not numbers";
    }
}

echo lower(5, 5);
