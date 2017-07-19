<?php

$str = file_get_contents("./test.txt");

//for windows-1250
$str = strtr($str, "����󜿟��ʣ�ӌ��", "acelnoszzACELNOSZZ");

//for iso-8859-2
//$str = strtr($str, "����󶿼��ʣ�Ӧ��", "acelnoszzACELNOSZZ");

file_put_contents("./test.txt", "$str");