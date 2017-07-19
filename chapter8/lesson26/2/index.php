<?php
$timeout = 3;

function visitsCount($timeout) {
    try {
        $db = new SQLite3("/var/wwwdata/stats.db", SQLITE3_OPEN_READWRITE);
    } catch (Exception $e) {
        echo "Error on connection attempt...<br>";
        echo "Error mesage: ";
        echo $e->getMessage();
        return false;
    }

    $val = time() - $timeout;
    $query = "SELECT COUNT(*) FROM stats WHERE time > $val";

    if (!$result = $db->query($query)) {
        $db = null;
        return false;
    }

    if ($row = $result->fetchArray(SQLITE3_NUM)) {
        $counter = $row[0];
    } else {
        $db = null;
        return false;
    }

    $db = null;
    return $counter;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>DB</title>
    </head>
    <body>
        <p>
<?php
if (($ile = visitsCount($timeout)) !== false) {
    echo "Number of users who visited this site in last ";
    echo "$timeout seconds: $ile.";
} else {
    echo "Visits counter is not available.";
}
?>
        </p>
    </body>
</html>