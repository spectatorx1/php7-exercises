<?php

//portion of code for non-latin characters, more versatile
//definition of variables to operate on
$nlExString = "aMfrąJNaŃUiJaęqH";
$exString = "aBFcoDpHddEmLIq";

//function declaration, enforcing type of variable to be string, if other type will be received it will be converted into string
//also function is forcing to return string type or convert to string and then return value
function nlCaseSwitcher(string $nlExString): string {
    return mb_strtolower($nlExString) ^ mb_strtoupper($nlExString) ^ $nlExString;
}

//display variable value before switch
echo "This is how string looks before switch: $nlExString <br>";
//call switching function and display its output
echo "And this is how it is after switch: " . nlCaseSwitcher($nlExString) . "<br>";

//portion of code which may have problems with non-latin characters, will not switch characters not recognised by functions
function caseSwitcher(string $exString): string {
    return strtolower($exString) ^ strtoupper($exString) ^ $exString;
}

echo "This is how string looks before switch: $exString <br>";
echo "And this is how it is after switch: " . caseSwitcher($exString) . "<br>";

//Just to show what happens when there is no multibyte function in use on unsupported characters i will output this:
echo "This is how string looks before switch: $nlExString <br>";
//unsupported characters will not be switched
echo "And this is how it is after switch: " . caseSwitcher($nlExString) . "<br>";