<?php
$days = 30;
$cookieViews = filter_input(INPUT_COOKIE, 'views', FILTER_VALIDATE_INT);
if (!isSet($cookieViews)) {
    $number = 1;
} else {
    if (is_numeric($cookieViews)) {
        $correct = true;
    } else {
        $correct = false;
    }
    $number = intval($cookieViews);
    if ($number < 1) {
        $number = 1;
    }
    $number++;
}
setCookie("views", "$number", time() + 60 * 60 * 24 * $days);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
        <title>Views counter</title>
    </head>
    <body>
        <p>
            <?php
            if ($correct) {
                if ($number == 1) {
                    $str = "time";
                } else {
                    $str = "times";
                }
                echo "In last $days days you visited this page $number $str.";
            } else {
                echo "Improper value received.";
            }
            ?>
        </p>
    </body>
</html>