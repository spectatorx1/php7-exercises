<?php
session_start();
$user = trim(strip_tags(filter_input(INPUT_POST, 'user', FILTER_VALIDATE_STRING)));
$pass = trim(strip_tags(filter_input(INPUT_POST, 'pass', FILTER_VALIDATE_STRING)));
if (isset($_SESSION['loggedin'])) {
    header("Location: 5main.php");
    exit();
} else if (isset($user) && isset($pass)) {
    if ($user == 'user1' && $pass == 'pass1') {
        $_SESSION['loggedin'] = 'user1';
        header("Location: 5main.php");
        exit();
    } else {
        $_SESSION['message'] = "Incorrect login and/or password.";
        header("Location: 5index.php");
        exit();
    }
}
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    $message = 'Enter username and password.';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Session</title>
    </head>
    <body>
        <div>
            <form action = "5index.php"
                  method = "post">
                      <?php
                      if (isset($message)):
                          ?>
                    <div><?= $message ?></div>
                    <?php
                endif;
                ?>
                <table>
                    <tr>
                        <td>Username:</td>
                        <td>
                            <input type="text" name="user">
                        </td>
                    </tr><tr>
                        <td>Password:</td>
                        <td>
                            <input type="password" name="pass">
                        </td>
                    </tr><tr>
                        <td colspan="2" style="text-align:center">
                            <input type="submit" value="Come in">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>