<?php

function getDirSize($dir, $subdirs = true) {
    $count = 0;
    if (!$fd = opendir($dir)) {
        return 0;
    }
    while (($file = readdir($fd)) !== false) {
        if ($file == "." || $file == "..") {
            continue;
        }
        if (is_dir("$dir/$file")) {
            if ($subdirs) {
                $count += getDirSize("$dir/$file");
            }
        } else if (is_file("$dir/$file")) {
            $count += filesize("$dir/$file");
        }
    }
    closedir($fd);
    return $count;
}

echo getDirSize("/temp", false);