<?php

//original code

//<?php
//  if(!$fd = fopen('test.txt', 'r')){
//    echo "Can't open a file test.txt.";
//  }
//  else{
//    while(($str = fgetc($fd)) !== false){
//      if($str == "\n") $str = "<br>";
//      echo $str;
//    }
//    fclose($fd);
//  }


//modified code

if (!$fd = fopen('test.txt', 'r')) {
    echo("Can't open a file test.txt.");
} else {
    $lineNo = 1;
    echo "$lineNo. ";
    while (($str = fgetc($fd)) !== false) {
        if ($str == "\n") {
            $lineNo++;
            echo("<br>$lineNo. ");
            continue;
        }
        echo($str);
    }
    fclose($fd);
}