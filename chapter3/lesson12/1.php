<?php

function getCounter() {
    if (!file_exists("./counter.txt")) {
        //counter file is missing
        return false;
    }
    if (!$fd = fopen("./counter.txt", "r+")) {
        //access to counter file denied
        return false;
    }
    flock($fd, LOCK_EX);
    $count = trim(fgets($fd));
    if (is_numeric($count)) {
        $count = $count + 1;
        $data = fgets($fd);
        fseek($fd, 0);
        fputs($fd, $count . "\n");
        fputs($fd, $data);
        $result = array($count, $data);
    } else {
        //incorrect data format
        $result = false;
    }
    flock($fd, LOCK_UN);
    fclose($fd);
    return $result;
}

function getCounterStr() {
    if (($data = getCounter()) !== false) {
        if (($count = $data[0]) == 1) {
            $times = 'time';
        } else {
            $times = 'times';
        }
        return "This page has been visited $count $times " .
                "since {$data[1]} year.";
    } else {
        return "Counter is not available.";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Counter</title>
    </head>
    <body>
        <p>
            <?php
            echo getCounterStr();
            ?>
        </p>
    </body>
</html>