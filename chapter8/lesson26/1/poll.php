<?php

session_start();

function updateData($color) {
    $dsn = "mysql:host=localhost;dbname=testphp";
    $user = "php";
    $password = "test";

    try {
        $dbo = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        return false;
    }

    $color = $dbo->quote($color);
    $query = "UPDATE colors SET Votes = Votes + 1 " .
            "WHERE Color = $color";
    $result = $dbo->query($query);

    if (!$result) {
        return false;
    }
    return true;
}

if (isset($_POST["vote"])) {
    $color = $_POST["vote"];
} else {
    $color = "";
}

if ($color == "" || ($color != 'red' && $color != 'green' && $color != 'blue' && $color != 'violet' && $color != 'black')) {
    $_SESSION['message'] = "Vote not casted, please choose one of colors.";
} else if (!updateData($color)) {
    $_SESSION['message'] = "Server error, can't save your vote.";
}
header('Location: results.php');