<?php

function resize_image($src_dir, $dest_dir, $imgName, $scale) {
    if (!($img = imagecreatefromjpeg($src_dir . $imgName))) {
        echo("Can't open file: $imgName");
        return false;
    }

    $img_w = imagesx($img);
    $img_h = imagesy($img);
    $new_img_w = $img_w * $scale / 100;
    $new_img_h = $img_h * $scale / 100;

    $tempImg = imagecreatetruecolor($new_img_w, $new_img_h);
    imagecopyresized($tempImg, $img, 0, 0, 0, 0, $new_img_w, $new_img_h, $img_w, $img_h);

    $name = substr($imgName, 0, strlen($imgName) - 4);
    if (!($ext = strrchr($imgName, "."))) {
        $ext = ".";
    }
    $name = $name . "-resized" . $ext;

    imagejpeg($tempImg, $dest_dir . $name);
    imagedestroy($tempImg);
}

function resize_dir_images($src_dir, $dest_dir = "", $size) {
    if (!($fd = opendir($src_dir))) {
        return false;
    }
    $array = array();

    while (($file = readdir($fd)) !== false) {
        if (!is_file($src_dir . $file)) {
            continue;
        }
        $ext = strtolower(substr($file, count($file) - 5, 5));
        if ($ext != '.jpg') {
            continue;
        }
        $array[] = $file;
    }
    if ($dest_dir == "")
        $dest_dir = $src_dir;
    foreach ($array as $key => $file) {
        resize_image($src_dir, $dest_dir, $file, $size);
    }
    closedir($fd);
}

if ($_SERVER['argc'] < 4) {
    exit("Call: php scaling.php src_folder/ dest_folder/ percent");
}

$src_dir = $_SERVER['argv'][1];
$dest_dir = $_SERVER['argv'][2];
$percent = $_SERVER['argv'][3];

resize_dir_images($src_dir, $dest_dir, $percent);