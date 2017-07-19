<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    $_SESSION['message'] = 'To access main site you have to log in.';
    header("Location: 5index.php");
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
        <p>Logged in user, welcome!.</p>
        <p>Log out before leaving the site.</p>
        <p><a href="5logout.php">Log out</a></p>
    </body>
</html>