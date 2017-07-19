<?php
if (!($ips_arr = file("./allowedips.txt", FILE_IGNORE_NEW_LINES))) {
    include "./bannedip.html";
    exit();
}

$ip = $_SERVER['REMOTE_ADDR'];

if (!in_array($ip, $ips_arr)) {
    include "./bannedip.html";
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Allowed only</title>
    </head>
    <body>
        <p>This is a site you are allowed to view, awesome, isn't it?</p>
    </body>
</html>