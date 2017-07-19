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
            exit;
        }

        $query = 'SELECT * FROM Person';

        if (!$arr = sqlite_array_query($db_lnk, $query, SQLITE_ASSOC)) {
            sqlite_close();
            echo 'Error: invalid query...<br>';
            echo '</body></html>';
            exit;
        }
        ?>

        <table>
            <?php
            echo "<tr>";
            foreach ($arr[0] as $key => $val) {
                echo "<td>$key</td>";
            }
            echo "</tr>";

            foreach ($arr as $row) {
                echo "<tr>";
                foreach ($row as $val) {
                    echo "<td>$val</td>";
                }
                echo "</tr>";
            }

            sqlite_close($db_lnk);
            ?>  
        </table>
    </body>
</html>