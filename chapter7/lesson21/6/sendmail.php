<?php

if (isset($_POST['subject']) && isset($_POST['content']) && isset($_POST['to'])) {
    $subject = $_POST['subject'];
    $content = $_POST['content'];
    $to = $_POST['to'];
    if ($subject == "" || $content == "" || $to == '') {
        header('Location:wrong_data.html');
    } else {
        if (mail($do, $subject, $content)) {
            header('Location:thx.html');
        } else {
            header('Location:server_error.html');
        }
    }
} else {
    header('Location:wrong_data.html');
}