<?php
session_start();

function checkPass($user, $pass) {
    if (!$fd = fopen("./passwords.txt", "r")) {
        return false;
    }
    $result = false;
    while (!feof($fd)) {
        $lineUser = rtrim(fgets($fd));
        $linePass = rtrim(fgets($fd));

        if ($lineUser != $user) {
            continue;
        }
        if ($linePass == $pass) {
            $result = true;
            break;
        }
    }
    fclose($fd);
    return $result;
}

$username = trim(strip_tags(filter_input(INPUT_POST, 'user', FILTER_VALIDATE_STRING)));
$password = trim(strip_tags(filter_input(INPUT_POST, 'pass', FILTER_VALIDATE_STRING)));
if (isset($_SESSION['loggedin'])) {
    header("Location: 6main.php");
    exit();
} else if (isset($username) && isset($password)) {
    if (checkPass($username, $password)) {
        $_SESSION['loggedin'] = 'user1';
        header("Location: 6main.php");
        exit();
    } else {
        $_SESSION['message'] = "Incorrect login and/or password.";
        header("Location: 6index.php");
        exit();
    }
}
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
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
            <form action = "6index.php"
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
                        <td>User:</td>
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