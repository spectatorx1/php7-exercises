<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    unset($_SESSION['loggedin']);
} else {
    header("Location: 2index.php");
    exit();
}
//Purge cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 360);
}
session_destroy();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Session</title>
    </head>
    <body>
        <p>Logged out</p>
        <p><a href='2index.php'>Return to home page</a></p>
    </body>
</html>