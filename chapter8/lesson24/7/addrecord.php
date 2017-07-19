<?php

session_start();

if (!isset($_POST['id']) || !isset($_POST['fname']) || !isset($_POST['lname']) ||
        !isset($_POST['byear']) || !isset($_POST['bplace'])) {
    $_SESSION['message'] = "Missing data.";
    header('Location:index.php');
    exit();
}

if ($_POST['id'] == '' || $_POST['fname'] == '' || $_POST['lname'] == '' ||
        $_POST['byear'] == '' || $_POST['bplace'] == '') {
    $_SESSION['message'] = "Missing data.";
    header('Location:index.php');
    exit();
}

$id = (int) $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$byear = $_POST['byear'];
$bplace = $_POST['bplace'];

if ($id < 0) {
    $id = 0;
}

if (!$db_lnk = @sqlite_open("/var/wwwdata/testphp.db", 0666, $msg)) {
    $_SESSION['message'] = "Error occured on connection attempt...";
    header('Location:index.php');
    exit();
}

$fname = sqlite_escape_string($fname);
$lname = sqlite_escape_string($lname);
$byear = sqlite_escape_string($byear);
$bplace = sqlite_escape_string($bplace);

$query = "INSERT INTO person VALUES(";
$query .= "$id, '$fname', '$lname', $byear, '$bplace'";
$query .= ")";

if (!@sqlite_exec($db_lnk, $query, $msg)) {
    sqlite_close($db_lnk);
    $_SESSION['message'] = "Error occured: query denied...";
    header('Location:index.php');
    exit;
}

$rowsNo = sqlite_changes($db_lnk);
sqlite_close($db_lnk);

$_SESSION['message'] = "Number of added records: $rowsNo";
header('Location:index.php');