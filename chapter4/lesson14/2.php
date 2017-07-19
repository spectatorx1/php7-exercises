<?php

$html_head = <<<htmlhead
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
htmlhead;

$html_foot = <<<htmlfoot
  </body>
</html>
htmlfoot;

$nofile = <<<nofile
<p style="text-align:center">No such file!</p>
<p style="text-align:center"> 
  <a href="http://localhost/download.html">Back to downloads page</a>
</p>
nofile;

$filesPath = "/var/wwwdata/downloads/";

function checkFileName($name, $path) {
    $fd = opendir($path);
    if (!$fd) {
        return false;
    }
    while (($file = readdir($fd)) !== false) {
        if (is_dir($path . $file)) {
            continue;
        }
        if ($file == $name) {
            return true;
        }
    }
    closedir($fd);
    return false;
}

function send($fileName, $filePath) {
    if (!file_exists($filePath . $fileName)) {
        return false;
    }
    $fd = fopen($filePath . $fileName, "r");
    $size = filesize($filePath . $fileName);
    $contents = fread($fd, filesize($filePath . $fileName));
    if ($contents === false) {
        return false;
    }

    fclose($fd);

    header("Content-Type: application/octet-stream");
    header("Content-Length: $size;");
    header("Content-Disposition: attachment; filename=$fileName");

    echo $contents;
    return true;
}

function printList($path) {
    $fd = opendir($path);
    if (!$fd) {
        return false;
    }
    echo "<ul>";
    while (($file = readdir($fd)) !== false) {
        if (is_dir($path . $file)) {
            continue;
        }
        echo("<li><a href=\"http://localhost/download.php?name=");
        echo("$file\">$file</a></li>");
    }
    echo "</ul>";
    closedir($fd);
}

$name = trim(strip_tags(filter_input(INPUT_GET, 'name', FILTER_VALIDATE_STRING)));
if (isset($name)) {
    if (checkFileName($name, $filesPath) === false) {
        echo $html_head;
        echo $nofile;
        echo $html_foot;
    } else {
        if (!send($name, $filesPath)) {
            echo $html_head;
            echo $nofile;
            echo $html_foot;
        }
    }
} else {
    echo $html_head;
    printList($filesPath);
    echo $html_foot;
}