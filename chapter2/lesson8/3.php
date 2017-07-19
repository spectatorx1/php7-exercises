<?php

function censorship($input, $arr) {
    return str_replace($arr, "[*****]", $input);
}

$ray = array("fuck", "shit");

echo censorship("PHP is awesome, JS is shit, fuck Java!<br> P.S. I'm kidding, all languages are awesome in their own ways :-)", $ray);