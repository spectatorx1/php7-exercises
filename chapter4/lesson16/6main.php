<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    $_SESSION['message'] = 'Access main site to log in.';
    header("Location: 6index.php");
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
        <p>Logged in user, welcome.</p>
        <p>Log out before leaving the site.</p>
        <p><a href="6logout.php">Log out</a></p>
    </body>
</html>