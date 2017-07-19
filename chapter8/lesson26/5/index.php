<?php
session_start();
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    $message = false;
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
            <h3>Manage passwords:</h3>
            <?php if ($message): ?>
                <p><?= htmlspecialchars($message) ?></p>
            <?php endif; ?>
            <form action = "execute.php"
                  method = "post">
                <table border="1">
                    <tr>
                        <td>User:</td>
                        <td colspan="2">
                            <input type="text" name="user">
                        </td>
                    </tr><tr>
                        <td>Password:</td>
                        <td colspan="2">
                            <input type="password" name="password">
                        </td>
                    </tr><tr>
                        <td>
                            <input type="radio" name="action" value="add" checked="checked"> Add
                        </td>
                        <td style="text-align:center">
                            <input type="radio" name="action" value="remove">Delete
                        </td>
                        <td>
                            <input type="radio" name="action" value="modify">Modify
                        </td>
                    </tr><tr>
                        <td colspan="3" style="text-align:center">
                            <input type="submit" value="Execute">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>