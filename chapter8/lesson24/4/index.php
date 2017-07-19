<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>DB</title>
    </head>
    <body>
        <?php
        if (!$db_lnk = sqlite_open("/var/wwwdata/testphp.db", 0666, $msg)) {
            echo 'Error on connection attempt...<br>';
            echo "Error message: $msg";
            echo "</body></html>";
            exit();
        }

        $query = "SELECT * FROM person ORDER BY Id";

        if (!$result = sqlite_unbuffered_query($db_lnk, $query)) {
            sqlite_close();
            echo 'Error occured: invalid query...<br>';
            echo "</body></html>";
            exit;
        }
        ?>

        <table>
            <?php
            $row = sqlite_fetch_array($result, MYSQL_ASSOC);

            echo "<tr>";
            foreach ($row as $key => $val) {
                echo "<td>$key</td>";
            }
            echo "</tr>";

            echo "<tr>";
            foreach ($row as $val) {
                echo "<td>$val</td>";
            }
            echo "</tr>";

            while ($row = sqlite_fetch_array($result, MYSQL_ASSOC)) {
                echo("<tr>");
                foreach ($row as $val) {
                    echo "<td>$val</td>";
                }
                echo("</tr>");
            }

            sqlite_close($db_lnk);
            ?>
        </table>
    </body>
</html>