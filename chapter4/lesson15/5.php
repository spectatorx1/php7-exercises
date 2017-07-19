<?php
$cookieVisited = filter_input(INPUT_COOKIE, 'visited', FILTER_VALIDATE_INT);
if (!isset($cookieVisited)) {
    setcookie("visited", "1");
}

function getCounter() {
    if (!file_exists("./counter.txt")) {
        fopen("counter.txt", "w");
        return false;
    }
    if (!$fd = fopen("./counter.txt", "r+")) {
        return false;
    }
    flock($fd, LOCK_EX);
    $count = fgets($fd);
    if (is_numeric($count)) {
        if (!isset($cookieVisited)) {
            $result = $count + 1;
            fseek($fd, 0);
            fputs($fd, $result);
        } else {
            $result = $count;
        }
    } else {
        $result = false;
    }
    flock($fd, LOCK_UN);
    fclose($fd);
    return $result;
}

function getCounterStr($dateStr) {
    if (($count = getCounter()) !== false) {
        if ($count == 1) {
            $times = 'time';
        } else {
            $times = 'times';
        }
        return "This site was visited $count $times " .
                "since $dateStr.";
    } else {
        return "Counter is temporarily unavailable.";
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
echo getCounterStr("20 May 2018");
?>
        </p>
    </body>
</html>