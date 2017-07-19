<?php

function process($arr) {
    foreach ($arr as $key => $val) {
        //for cp1250
        $arr[$key] = strtr($arr[$key], "����󜿟��ʣ�ӌ��", "acelnoszzACELNOSZZ");

        //for iso-8859-2
        //$arr[$key] = strtr($arr[$key], "����󶿼��ʣ�Ӧ��", "acelnoszzACELNOSZZ");
    }
    return $arr;
}

$arr = array("���", "���");

$arr = process($arr);

echo $arr[0], $arr[1];