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

if (!$db = mysqli_connect("localhost", "php", "test")) {
    $_SESSION['message'] = "Error on connection attempt...";
    header('Location:index.php');
    exit();
}

if (!mysqli_select_db($db, 'testphp')) {
    mysqli_close($db);
    $_SESSION['message'] = "Error on database select: testphp";
    header('Location:index.php');
    exit();
}

//special chars workaround
$fname = mysqli_real_escape_string($db, $fname);
$lname = mysqli_real_escape_string($db, $lname);
$byear = mysqli_real_escape_string($db, $byear);
$bplace = mysqli_real_escape_string($db, $bplace);

$query = "INSERT INTO person VALUES(";
$query .= "$id, '$fname', '$lname', $byear, '$bplace'";
$query .= ")";

if (!$result = mysqli_query($db, $query)) {
    mysqli_close($db);
    $_SESSION['message'] = "Error occured: query denied...";
    header('Location:index.php');
    exit;
}

$rowsNo = mysqli_affected_rows($db);

$_SESSION['message'] = "Number of added records: $rowsNo";

if (!mysqli_close($db)) {
    $_SESSION['message'] = "Error on closing connection...";
}
header('Location:index.php');