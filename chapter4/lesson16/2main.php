<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: 2index.php");
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
        <p>Welcome!</p>
        <p>Log out before closing this website.</p>
        <p><a href="logout.php">Log out</a></p>
    </body>
</html>