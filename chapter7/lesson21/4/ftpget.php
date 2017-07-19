<?php

if ($_SERVER['argc'] < 6) {
    exit("Call: php ftpget host user pass remote_file local_file");
}

$host = $_SERVER['argv'][1];
$user = $_SERVER['argv'][2];
$pass = $_SERVER['argv'][3];

$remote_file = $_SERVER['argv'][4];
$local_file = $_SERVER['argv'][5];

if (!$ftpid = ftp_connect($host)) {
    exit("Can't connect to ftp server.\n");
}

echo "Connected to server $host ...\n";

if (!ftp_login($ftpid, $user, $pass)) {
    ftp_close($ftpid);
    exit("Login attempt failed...\n");
} else {
    echo "Logged in successfully...\n";
}

if (!ftp_get($ftpid, $local_file, $remote_file, FTP_BINARY)) {
    echo "Error while downloading file: $remote_file...";
} else {
    echo "File $remote_file was downloaded and saved as $local_file.\n";
}

if (!ftp_close($ftpid)) {
    echo "Error on closing connection ...\n";
} else {
    echo "Connection closed ...\n";
}