<?php
$users = array("user1", "user2", "user3");
$pass = array("pass1", "pass2", "pass3");
$username = trim(strip_tags(filter_input(INPUT_POST, 'username', FILTER_VALIDATE_STRING)));
$password = trim(strip_tags(filter_input(INPUT_POST, 'password', FILTER_VALIDATE_STRING)));

if (isSet($username) && isSet($password)) {
    foreach ($users as $key => $val) {
        if ($username == $val && $password == $pass[$key]) {
            header("Location: 1a.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Log in form</title>
    </head>
    <body>
        <div>
            <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                  method = "post">
                <table>
                    <tr>
                        <td>User:</td>
                        <td>
                            <input type="text" name="username">
                        </td>
                    </tr><tr>
                        <td>Password:</td>
                        <td>
                            <input type="password" name="password">
                        </td>
                    </tr><tr>
                        <td colspan="2" style="text-align:center">
                            <input type="submit" value="login">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>