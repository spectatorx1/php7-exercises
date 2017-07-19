<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    unset($_SESSION['loggedin']);
} else {
    $_SESSION['message'] = 'To log out you need to log in first.';
    header("Location: 5index.php");
    exit();
}
//unset session
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
        <p>Log out successful</p>
        <p><a href='5index.php'>Return to log in site</a></p>
    </body>
</html>
