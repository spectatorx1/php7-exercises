<?php
$A = $_GET["A"];
$B = $_GET["B"];
$operation = $_GET["operation"];

if (isset($A) && isset($B) && isset($operation)) {
    if (!is_numeric($A) || !is_numeric($B)) {
        echo "Invalid parameters.";
    } else {
        if ($operation == 'plus') {
            echo "$A + $B = ", $A + $B;
        } else if ($operation == 'minus') {
            echo "$A - $B = ", $A - $B;
        } else if ($operation == 'multiplication') {
            echo "$A * $B = ", $A * $B;
        } else if ($operation == 'division') {
            echo "$A / $B = ", $A / $B;
        } else if ($operation == 'power') {
            echo "$A power of $B = ", $A ** $B;
        } else if ($operation == 'root') {
            echo "$B -th root of $A = ", $A ** (1 / $B);
        } else {
            echo "Invalid operator.";
        }
    }
} else {
    echo "No operators.";
}
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form name='form1' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='get'>
            <div>
                <p>Number 1 <input type='number' name='A'></p>
                Addition <input type='radio' name='operation' value='plus' checked='checked'>
                Subtraction <input type='radio' name='operation' value='minus'>
                Multiplication <input type='radio' name='operation' value='multiplication'>
                Division <input type='radio' name='operation' value='division'>
                Power <input type='radio' name='operation' value='power'>
                Root <input type='radio' name='operation' value='root'>
                <p>Number 2 <input type='number' name='B'></p>
                <input type='submit' value="Calculate">
            </div>
        </form>
    </body>
</html>