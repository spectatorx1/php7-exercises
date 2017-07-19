<?php

function calculate($A, $B, $C) {

    $a = trim(strip_tags(filter_input(INPUT_GET, 'A', FILTER_SANITIZE_FLOAT)));
    $b = trim(strip_tags(filter_input(INPUT_GET, 'B', FILTER_SANITIZE_FLOAT)));
    $c = trim(strip_tags(filter_input(INPUT_GET, 'C', FILTER_SANITIZE_FLOAT)));

    //Output equasion parameters
    echo("Equasion parameters: <br>");
    echo("A = $a, B = $b, C = $c <br>");

    //Check if equasion is quadratic
    if ($a == 0) {
        //$a equals zero, it is not quadratic equasion
        echo("This is not quadratic equasion: A = 0!");
    } else {
        //A is different from zero, equasion is quadratic
        //Calculate delta
        $delta = $b * $b - 4 * $a * $c;

        //If delta is lower than zero
        if ($delta < 0) {
            echo ("Delta < 0<br>");
            echo ("This equasion has no result in set of real numbers.");
        }
        //If delta is equal or higher than zero
        else {
            //If delta equals zero
            if ($delta == 0) {
                //Calculating result
                $result = - b / (2 * a);
                echo("Result: x = $result");
            }
            //If delta is bigger than zero
            else {
                //counting results
                $result = (- $b + sqrt($delta)) / (2 * $a);
                echo ("Result x1 = $result");
                $result = (- $b - sqrt($delta)) / (2 * $a);
                echo(", x2 = $result");
            }
        }
    }
}

if (isset($a) && isset($b) && isset($c)) {
    if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
        echo "Incorrect parameters";
    } else {
        calculate($a, $b, $c);
    }
} else {
    echo "Incorrect parameters.";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>/title>
    </head>
    <body>
        <form name='form1' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='get'>
            <div>
                <p>parametr A <input type='text' name='A'></p>
                <p>parametr B <input type='text' name='B'></p>
                <p>parametr C <input type='text' name='C'></p>
                <input type='submit' value="Calculate!">
            </div>
        </form>
    </body>
</html>