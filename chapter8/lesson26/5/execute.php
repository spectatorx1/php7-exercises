<?php

session_start();

function doAction($user, $pass, $action) {
    if (!($db = mysqli_connect("localhost", "php", "test")) || !mysqli_select_db($db, "testphp")) {
        $_SESSION['message'] = "Error on connection attempt.";
        return false;
    }

    $user = mysqli_real_escape_string($db, $user);
    $pass = mysqli_real_escape_string($db, $pass);

    $query = "SELECT COUNT(*) FROM USERS WHERE name = '$user'";

    if (!$result = mysqli_query($db, $query)) {
        $_SESSION['message'] = "Database error: query denied. (1)";
        mysqli_close($db);
        return false;
    }

    if (!$row = mysqli_fetch_row($result)) {
        $_SESSION['message'] = "Database error: query denied. (2)";
        mysqli_close($db);
        return false;
    }

    if ($action == "add") {
        if ($row[0] != 0) {
            echo("Such username already exists!");
        } else {
            $query = "INSERT INTO USERS(name, password) VALUES('";
            $query .= $user . "', '" . $pass . "')";
            $result = mysqli_query($db, $query);
            if (!$result) {
                $_SESSION['message'] = "Database error: query denied. (3)";
            } else {
                $_SESSION['message'] = "User $user added to database.";
            }
        }
    } else if ($action == "remove") {
        if ($row[0] != 1) {
            $_SESSION['message'] = "Such username doesn't exist!";
        } else {
            $query = "DELETE FROM USERS WHERE name='" . $user . "'";
            $result = mysqli_query($db, $query);
            if (!$result) {
                $_SESSION['message'] = "Database error: query denied. (4)";
            } else {
                $_SESSION['message'] = "User $user removed from database.";
            }
        }
    } else if ($action == "modify") {
        if ($row[0] != 1) {
            $_SESSION['message'] = "Such username doesn't exist!";
        } else {
            $query = "UPDATE USERS SET password='$pass' WHERE name='$user'";
            $result = mysqli_query($db, $query);
            if (!$result) {
                $_SESSION['message'] = "Database error: query denied. (5)";
            } else {
                $_SESSION['message'] = "User $user details modified.";
            }
        }
    } else {
        $_SESSION['message'] = "Invalid data: action=$action";
        return false;
    }
    mysqli_close($db);
}

if (isset($_POST["password"])) {
    $pass = $_POST["password"];
} else {
    $_SESSION['message'] = "Missing password input.";
    header('Location: index.php');
    exit();
}

if (isset($_POST["user"])) {
    $user = $_POST["user"];
} else {
    $_SESSION['message'] = "Missing input user.";
    header('Location: index.php');
    exit();
}

if (isset($_POST["action"])) {
    $action = $_POST["action"];
} else {
    $_SESSION['message'] = "Missing input action.";
    header('Location: index.php');
    exit();
}

if ($pass == "" && $action != "remove") {
    $_SESSION['message'] = "Missing password!";
    header('Location: index.php');
    exit;
}
if ($user == "") {
    $_SESSION['message'] = "Missing username!";
    header('Location: index.php');
    exit;
}

doAction($user, $pass, $action);
header('Location: index.php');