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

$files_list = <<<fileslist
<div>
  <ul>
    <li><a href="http://localhost/download.php?name=file1.zip">
    First file</a></li>
    <li><a href="http://localhost/download.php?name=file2.zip">
    Second file</a></li>
    <li><a href="http://localhost/download.php?name=file3.zip">
    Third file</a></li>
  </ul>
</div>
fileslist;

$nofile = <<<nofile
<p style="text-align:center">No such file on server!</p>
<p style="text-align:center"> 
  <a href="http://localhost/download.html">Back to downloads page</a>
</p>
nofile;

$filesPath = "./";

function checkFileName($name) {
    if (strlen($name) > 100) {
        return false;
    }
    $filei = array(
        "file1.zip", "file2.zip", "file3.zip"
    );
    return array_search($name, $filei);
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

$name = trim(strip_tags(filter_input(INPUT_GET, 'name', FILTER_VALIDATE_STRING)));
if (isset($name)) {
    if (checkFileName($name) === false) {
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
    echo $files_list;
    echo $html_foot;
}