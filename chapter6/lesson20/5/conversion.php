<?php

function getImage($imgName, $imgType) {
    if ($imgType == IMG_JPEG) {
        $img = imagecreatefromjpeg($imgName);
    } else if ($imgType == IMG_GIF) {
        $img = imagecreatefromgif($imgName);
    } else if ($imgType == IMG_PNG) {
        $img = imagecreatefrompng($imgName);
    } else {
        $img = null;
    }
    return $img;
}

function saveImage($img, $name, $imgType) {
    $name = substr($name, 0, strlen($name) - 3);
    switch ($imgType) {
        case IMG_JPEG:
            $name .= "jpg";
            imagejpeg($img, $name);
            break;
        case IMG_GIF:
            $name .= "gif";
            imagegif($img, $name);
            break;
        case IMG_PNG:
            $name .= "png";
            imagepng($img, $name);
            break;
    }
}

function getImageType($src_img_name) {
    $ext = substr($src_img_name, strlen($src_img_name) - 3, 3);
    $ext = strtolower($ext);
    if ($ext == 'jpg') {
        return IMG_JPEG;
    } else if ($ext == 'gif') {
        return IMG_GIF;
    } else if ($ext == 'png') {
        return IMG_PNG;
    } else {
        return null;
    }
}

function convert_image($src_dir, $dest_dir, $name, $dest_img_type) {
    if (($type = getImageType("$src_dir/$name")) == null) {
        echo("Uncrecognized file format!");
        return false;
    }
    if ($type == $dest_img_type) {
        echo("Source file format must be different from original file: ");
        echo("$src_dir/$name!");
        return false;
    }

    if (!($img = getImage("$src_dir/$name", $type))) {
        echo("Can't open file: $src_dir/$name");
        return false;
    }
    saveImage($img, "$dest_dir/$name", $dest_img_type);
}

function convert_dir_images($src_dir, $dest_dir, $img_type) {
    if (!($fd = opendir($src_dir)))
    {
        return false;
    }
    $array = array();

    while (($file = readdir($fd)) !== false) {
        if (!is_file($src_dir . '/' . $file)) {
            continue;
        }
        $ext = strtolower(substr($file, count($file) - 5, 5));
        if ($ext != '.jpg' && $ext != '.gif' && $ext != '.png') {
            continue;
        }
        $array[] = $file;
    }

    if ($dest_dir == "") {
        $dest_dir = $src_dir;
    }
    foreach ($array as $val) {
        convert_image($src_dir, $dest_dir, $val, $img_type);
    }
    closedir($fd);
}

if ($_SERVER['argc'] < 4) {
    exit("Call: php scaling.php src_dir dest_dir dest_format");
}

$src_dir = $_SERVER['argv'][1];
$dest_dir = $_SERVER['argv'][2];
$type = strtolower($_SERVER['argv'][3]);

switch ($type) {
    case "jpg" :
        $type = IMG_JPEG;
        break;
    case "png" :
        $type = IMG_PNG;
        break;
    case "gif" :
        $type = IMG_GIF;
        break;
}

convert_dir_images($src_dir, $dest_dir, $type);