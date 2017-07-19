<?php
$days = 14;
$cookieViews = filter_input(INPUT_COOKIE, 'views', FILTER_VALIDATE_STRING);
$views = (int) $cookieViews;

if (!isset($views)) {
    $views = 0;
} else {
    if ($views >= 0) {
        $views++;
    }
}
setcookie("views", "$views", time() + 60 * 60 * 24 * $days);
?>

<html>
    <head>
        <title>Cookies</title>
    </head>
    <body>
        <p>
            <?php
            if ($views > 3) {
                echo "This page was viewed $views in last $days days.";
            } else {
                echo "$views Refresh few more times to see what will happen";
            }
            ?>
        </p>
    </body>
</html>