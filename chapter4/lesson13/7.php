<?php
$stat_file = "./stats.txt";

function writeData($stat_file) {
    $file_str = "";
    if (file_exists($stat_file)) {
        if (($file_str = file_get_contents($stat_file)) === false) {
            return false;
        }
    }
    if (!$fd = fopen($stat_file, "w")) {
        return false;
    }
    $str = date("Y-m-d G:i") . " ";
    $str .= $_SERVER['REMOTE_ADDR'] . " ";
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $str .= $_SERVER['HTTP_USER_AGENT'];
    }
    $str .= "\n";
    fwrite($fd, $str);
    fwrite($fd, $file_str);
    fclose($fd);
    return true;
}

function printData($stat_file, $times = -1) {
    $times = (int) $times;
    if (!$fd = fopen($stat_file, "r")) {
        return false;
    }
    echo "<ol>";
    $counter = 1;
    while (!feof($fd)) {
        if ($times >= 0 && $counter++ > $times) {
            break;
        }
        if (($str = fgets($fd)) != "") {
            echo("<li>$str</li>");
        }
    }
    echo "</ol>";
    return true;
}

writeData($stat_file);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <p>List of visits:</p>
        <div>
            <?php
            $times = trim(strip_tags(filter_input(INPUT_GET, 'times', FILTER_SANITIZE_FLOAT)));
            if (!printData($stat_file, isset($times) ? $times : -1)) {
                echo("<p>List is not available.</p>");
            }
            ?>
        </div>
    </body>
</html>