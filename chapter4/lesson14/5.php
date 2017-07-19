<?php

$filesPath = "./";

function checkFileName($name) {
    if (strlen($name) > 100) {
        return false;
    }
    $files = array(
        "file1.zip", "file2.zip", "file3.zip"
    );
    return array_search($name, $files);
}

function send($fileName, $filePath) {
    if (!file_exists($filePath . $fileName)) {
        return false;
    }
    $fd = fopen($filePath . $fileName, "r");
    $size = filesize($filePath . $fileName);

    if ($size == 0) {
        $contents = '';
    } else {
        $contents = fread($fd, filesize($filePath . $fileName));
    }

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
        include "nofile.html";
    } else {
        if (!send($name, $filesPath)) {
            include "nofile.html";
        }
    }
} else {
    include "nofile.html";
}