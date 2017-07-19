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
            This is subsite 2.
        </p>
        <p><a href="3index.php">3index.php</a></p>
        <p><a href="3site1.php">3site1.php</a></p>
    </body>
</html>
