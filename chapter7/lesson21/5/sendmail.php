<?php

session_start();
$limit = 3;

if (isset($_SESSION['mailscount'])) {
    if ($_SESSION['mailscount'] >= $limit) {
        header('Location:limit_exceeded.html');
        exit();
    }
} else {
    $_SESSION['mailscount'] = 0;
}

$to = "mail@mail.com";
if (isset($_POST['subject']) && isset($_POST['content'])) {
    $subject = $_POST['subject'];
    $content = $_POST['content'];
    if ($subject == "" || $content == "") {
        header('Location:incorrect_data.html');
    } else {
        if (mail($to, $subject, $content)) {
            $_SESSION['mailscount'] ++;
            header('Location:thx.html');
        } else {
            header('Location:server_error.html');
        }
    }
} else {
    header('Location:incorrect_data.html');
}