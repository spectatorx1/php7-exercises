<?php
session_start();
if (!isset($_SESSION['visited'])) {
    header("Location: 3index.php");
    exit();
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
            This is subsite 1.
        </p>
        <p><a href="3index.php">3index.php</a></p>
        <p><a href="3site2.php">3site2.php</a></p>
    </body>
</html>