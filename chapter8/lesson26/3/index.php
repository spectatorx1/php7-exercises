<?php
session_start();

function checkPass($user, $pass) {
    if (!$db = mysqli_connect("localhost", "php", "test")) {
        return false;
    }

    if (!mysqli_select_db($db, 'testphp')) {
        mysqli_close($db);
        return false;
    }

    $user = mysqli_real_escape_string($db, $user);
    $query = "SELECT password, name, site FROM users WHERE name='$user'";

    if (!$result = mysqli_query($db, $query)) {
        mysqli_close($db);
        return false;
    }

    if (mysqli_num_rows($result) != 1) {
        mysqli_close($db);
        return false;
    }

    if (!$row = mysqli_fetch_row($result)) {
        mysqli_close($db);
        return false;
    }

    mysqli_close($db);

    if ($row[0] == $pass) {
        if ($row[2] != '') {
            $result = array($row[1], $row[2]);
        } else {
            $result = array($row[1], 'main.php');
        }
    } else {
        $result = false;
    }
    return $result;
}

if (isset($_SESSION['loggedin'])) {
    header("Location: main.php");
    exit();
} else if (isset($_POST['user']) && isset($_POST['password'])) {
    if ($user = checkPass($_POST['user'], $_POST['password'])) {
        $_SESSION['loggedin'] = $user[0];
        header("Location: {$user[1]}");
        exit();
    } else {
        $_SESSION['message'] = "Invalid credentials.";
        header("Location: index.php");
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
        <title></title>
    </head>
    <body>
        <div>
            <form action = "index.php"
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
                            <input type="password" name="password">
                        </td>
                    </tr><tr>
                        <td colspan="2" style="text-align:center">
                            <input type="submit" value="Enter">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>