<?php
//example of usage of bit operators
$a = 1011001;
$b = 0101100;

echo ($a&$b)."<br>";
echo ($a|$b)."<br>";
echo (-$a)."<br>";
echo (-$b)."<br>";
echo ($a^$b)."<br>";
echo ($a<<$b)."<br>";
echo ($a>>$b)."<br>";