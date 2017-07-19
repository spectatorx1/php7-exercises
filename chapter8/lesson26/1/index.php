<?php

function readData() {
    $dsn = "mysql:host=localhost;dbname=testphp";
    $user = "php";
    $password = "test";

    try {
        $dbo = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        return false;
    }

    $query = 'SELECT Color FROM colors ORDER BY Color';

    if (!$result = $dbo->query($query)) {
        return false;
    }

    return $result->fetchAll(PDO::FETCH_NUM);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Colors poll</title>
    </head>
    <body>
        <h3>What's your favorite color?</h3>

        <?php if ($colors = readData()): ?>
            <form method="post" action="poll.php">
                <div>
                    <table>

                        <?php foreach ($colors as $color): ?>
                            <tr>
                                <td><?= $color[0] ?></td>
                                <td>
                                    <input type="radio" name="vote" value="<?= $color[0] ?>">
                                </td>
                            </tr>
                        <?php endforeach ?>

                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Vote!">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        <?php else: ?>
            <p>Survey is not available.</p>
        <?php endif; ?>
    </body>
</html>