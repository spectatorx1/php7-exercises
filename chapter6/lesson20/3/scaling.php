<?php

if ($_SERVER['argc'] < 4) {
    exit("Scaling image");
}

$orig_name = $_SERVER['argv'][1];
$final_width = $_SERVER['argv'][2];
$final_height = $_SERVER['argv'][3];

if (!file_exists($orig_name)) {
    exit("There is no such file: $orig_name");
}

if (!$img_src = imagecreatefromjpeg("$orig_name")) {
    exit("Can't load file $orig_name.\n");
}

$width = imagesx($img_src);
$height = imagesy($img_src);

if (!$img_dest = imagecreatetruecolor($final_width, $final_height)) {
    exit("Can't create new image.\n");
}

if (!imagecopyresampled($img_dest, $img_src, 0, 0, 0, 0, $final_width, $final_height, $width, $height)) {
    exit("Can't scale.");
}

$final_name = substr($orig_name, 0, count($orig_name) - 5);
$final_name .= "-resized.jpg";

if (!imagejpeg($img_dest, $final_name)) {
    exit("Error ocured during saving file $final_name.");
}

echo ("Scaled successfully!");

imagedestroy($img_src);
imagedestroy($img_dest);
