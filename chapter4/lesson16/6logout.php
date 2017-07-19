<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    unset($_SESSION['loggedin']);
} else {
    $_SESSION['message'] = 'To log out you need to be logged in first.';
    header("Location: 6index.php");
    exit();
}
//destroy session
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
        <p>Logged out successfully</p>
        <p><a href='6index.php'>Return to main site</a></p>
    </body>
</html>