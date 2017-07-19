<?php
session_start();

function readData() {
    $dsn = "mysql:host=localhost;dbname=testphp";
    $user = "php";
    $password = "test";

    try {
        $dbo = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        return false;
    }

    $query = 'SELECT SUM(Votes) FROM colors';
    if (!$result = $dbo->query($query)) {
        return false;
    }

    if (!$row = $result->fetch(PDO::FETCH_NUM)) {
        echo "Poll results are unavailable.";
        return false;
    }

    $votes_no = $row[0];

    $query = "SELECT Color, Votes, Votes * 100 / $votes_no";
    $query .= " AS Perc FROM colors ORDER BY Votes DESC";

    if (!$result = $dbo->query($query)) {
        return false;
    }

    return $result->fetchAll(PDO::FETCH_NUM);
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    $message = false;
}

$votes = readData();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Poll results</title>
    </head>
    <body>
<?php
if ($message) {
    echo "<p>$message</p>";
}
?>
        <h3>Poll results</h3>
        <?php
        if ($votes):
            ?>
            <table border='1'>
                <tr>
                    <td>Color name</td>
                    <td>Number of votes</td>
                    <td>Votes percentage</td>
                </tr>
    <?php foreach ($votes as $row): ?>
                    <tr>
                        <td><?= $row[0] ?></td>
                        <td><?= $row[1] ?></td>
                        <td><?= $row[2] ?></td>
                    </tr>
    <?php endforeach; ?>  
            </table>
                <?php
            else:
                echo "<p>Poll results are unavailable.</p>";
            endif;
            ?>
        <p><a href="poll.html">Back to poll</a></p>
    </body>
</html>