<?php

function convert($string, $mode = "iso") {
    $cp1250 = "������";
    $iso88592 = "������";

    if ($mode == "iso") {
        $string = strtr($string, $cp1250, $iso88592);
    } else if ($mode == "cp1250") {
        $string = strtr($string, $iso88592, $cp1250);
    }
    return $string;
}

echo convert("�����Ɯ�");