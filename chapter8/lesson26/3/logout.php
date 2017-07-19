<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    unset($_SESSION['loggedin']);
} else {
    header("Location: index.php");
    exit();
}

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 360);
}
session_destroy();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <p>Logged out successfully</p>
        <p><a href='index.php'>Back to log in page</a></p>
    </body>
</html>