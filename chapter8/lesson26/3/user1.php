<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <p>Homepage for user1.</p>
        <p>Remember to log out before leaving the site.</p>
        <p><a href="logout.php">Logout</a></p>
    </body>
</html>