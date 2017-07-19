<?php
session_start();
if (!isset($_SESSION['visited'])) {
    $_SESSION['visited'] = true;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Session</title>
    </head>
    <body>
        <p>
            This is main site.
        </p>
        <p><a href="3site1.php">3site1.php</a></p>
        <p><a href="3site2.php">3site2.php</a></p>
    </body>
</html>