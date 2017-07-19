<?php

//original code:
//<?php
//  $dir = "./";
//  if(!($fd = opendir($dir))){
//    exit("Can't open directory $dir!");
//  }
//
//  while (($file = readdir($fd)) !== false){
//    echo "$file<br>";
//  }
//
//  closedir($fd);

$dir = "./";
if (!($fd = opendir($dir))) {
    exit("Can't open directory $dir!");
}
$file = true;
while ($file !== false) {
    $file = readdir($fd);
    echo "$file<br>\n";
}
closedir($fd);