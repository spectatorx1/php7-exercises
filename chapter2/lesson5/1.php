<?php

//// Original code
//  $A = 1;
//  $B = 1;
//  $C = -2;
//
//  //Displaying values
//  echo "Values to calculate: <br>";
//  echo "A = $A, B = $B, C = $C <br>";
//
//  //check if equasion is quadratic
//  if ($A == 0){
//    // if $A is equal to zero then equasion is not quadratic
//    echo "This is not quadratic equasion: A = 0!";
//  }
//  else{
//    //If $A is different from zero then we have quadratic equasion
//    //Calculating delta
//    $delta = $B * $B - 4 * $A * $C;
//
//    //If delta is lower than zero
//    if ($delta < 0){
//       echo "Delta < 0 <br>";
//       echo "This equasion has no result in set of real numbers!";
//    }
//    //If delta is equal or bigger than zero
//    else{
//       //If delta is equal to zero
//       if ($delta == 0){
//         //Calculating result
//         $result = - B / (2 * A);
//         echo "Result: x = $result";
//
//       }
//       //If delta is bigger than zero
//       else{
//         //Calculating result
//         $result = (- $B + sqrt($delta)) / (2 * $A);
//         echo "Result: x1 = $result";
//         $result = (- $B - sqrt($delta)) / (2 * $A);
//         echo ", x2 = $result";
//       }
//    }
//  }
//code modified to use if else if
$A = 1;
$B = 1;
$C = -2;

//Displaying values
echo "Equasion values: <br>";
echo "A = $A, B = $B, C = $C <br>";

//check if equasion is quadratic
if ($A == 0) {
    //if $A is equal to zero then equasion is not quadratic
    echo "This is not quadratic equasion: A = 0!";
} else {
    //If $A is different from zero then we have quadratic equasion
    //Calculating delta
    $delta = $B * $B - 4 * $A * $C;

    //If delta is lower than zero
    if ($delta < 0) {
        echo ("Delta < 0<br>");
        echo ("This equasion has no result in set of real numbers!");
    }
    //If delta is equal zero
    else if ($delta == 0) {
        //Calculating result
        $result = - $B / (2 * $A);
        echo("Result: x = $result");
    }
    //If delta is bigger than zero
    else if ($delta > 0) {
        //Calculating results
        $result = (- $B + sqrt($delta)) / (2 * $A);
        echo("Result: x1 = $result");
        $result = (- $B - sqrt($delta)) / (2 * $A);
        echo(", x2 = $result");
    }
}