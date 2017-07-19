<?php
session_start();
$password = trim(strip_tags(filter_input(INPUT_POST, 'password', FILTER_VALIDATE_STRING)));
if (isset($_SESSION['loggedin'])) {
    header("Location: 2main.php");
    exit();
} else if (isset($password)) {
    if ($password == 'pass1') {
        $_SESSION['loggedin'] = true;
        header("Location: 2main.php");
        exit();
    } else {
        $_SESSION['message'] = "Incorrect password.";
        header("Location: 2index.php");
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
            <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
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
                        <td>Password:</td>
                        <td>
                            <input type="password" name="password">
                        </td>
                    </tr><tr>
                        <td colspan="2" style="text-align:center">
                            <input type="submit" value="Log in">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>