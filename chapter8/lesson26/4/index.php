<?php

function stats() {
    if (!$db = mysqli_connect("localhost", "php", "test")) {
        return;
    }
    if (!mysqli_select_db($db, "testphp")) {
        mysqli_close($db);
        return;
    }

    $arr_systems = array('windows', 'linux');
    $arr_systems_res = array();
    $arr_browsers = array('chrome', 'firefox', 'msie', 'opera');
    $arr_browsers_res = array();

    foreach ($arr_systems as $val) {
        $query = "SELECT COUNT(*) FROM Stats WHERE agent LIKE '%$val%'";

        if (!$result = mysqli_query($db, $query)) {
            $arr_systems_res[] = 0;
        } else {
            if (!$row = mysqli_fetch_row($result)) {
                $arr_systems_res[] = 0;
            } else {
                $arr_systems_res[] = $row[0];
            }
        }
    }

    foreach ($arr_browsers as $val) {
        $query = "SELECT COUNT(*) FROM Stats WHERE agent LIKE '%$val%'";
        if (!$result = mysqli_query($db, $query)) {
            $arr_browsers_res[] = 0;
        } else {
            if (!$row = mysqli_fetch_row($result)) {
                $arr_browsers_res[] = 0;
            } else {
                $arr_browsers_res[] = $row[0];
            }
        }
    }

    mysqli_close($db);

    $count = 0;
    foreach ($arr_systems_res as $key => $val) {
        echo $arr_systems[$key] . ": " . $val . "<br>";
        $count += $val;
    }

    echo "In total $count <br><br>";

    $count = 0;
    foreach ($arr_browsers_res as $key => $val) {
        echo $arr_browsers[$key] . ": " . $val . "<br>";
        $count += $val;
    }

    echo "In total $count";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>W</title>
    </head>
    <body>
        <div>
            <?php
            echo stats();
            ?>
        </div>
    </body>
</html>