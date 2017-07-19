<?php

//variable $number must be equal to 10 or 20 or different from both, 10 and 20.
$number = 10;
switch ($number) {
    case 10 or 20 :
        echo "Variable \$number is one of values which we are looking for.";
        break;
    case!10 and ! 20 :
        echo "Variable \$number is different from 10 and 20.";
        break;
    default :
        echo "Something went wrong. Probably provided value is not a number";
}