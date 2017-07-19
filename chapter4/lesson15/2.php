<?php
$years = 10;
$birthd = trim(strip_tags(filter_input(INPUT_POST, 'birthd', FILTER_VALIDATE_STRING)));
$cookieBirthd = filter_input(INPUT_COOKIE, 'birthd', FILTER_VALIDATE_STRING);

if (isset($birthd)) {
    setcookie("birthd", $birthd, time() + 60 * 60 * 24 * 365 * $years);
    header('Location:2.php');
    die();
}

if (isset($cookieBirthd)) {
    if ($cookieBirthd == date('d-m', time())) {
        $birthdayStr = "Awesome, today is your birthday!";
    }
} else if (!isset($cookieBirthd)) {
    $birthd = "DD-MM";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Birth date site</title>
    </head>
    <body>
        <p>
            Welcome.
        </p>

        <?php
        if (isset($birthdayStr)) {
            echo "<p>$birthdayStr</p>";
        }
        ?>
        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
            <div>
                Input your date of birth: 
                <input type='text' name='birthd' value='<?php echo $birthd; ?>'>
                <br>
                <input type='submit' value='setv'>
            </div>
        </form>
    </body>
</html>