<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SQLite</title>
    </head>
    <body>
        <?php
        if (!$db_lnk = sqlite_open("/var/wwwdata/testphp.db", 0666, $msg)) {
            echo 'Error on connection attempt...<br>';
            echo "Error message: $msg";
            echo "</body></html>";
            exit();
        }

        if (isset($_GET['sortid'])) {
            $sortid = (int) $_GET['sortid'];
        } else {
            $sortid = 1;
        }

        switch ($sortid) {
            case 1:
                $sortColumn = "Id";
                break;
            case 2:
                $sortColumn = "First_name";
                break;
            case 3:
                $sortColumn = "Last_name";
                break;
            case 4:
                $sortColumn = "Birth_year";
                break;
            case 5:
                $sortColumn = "Birth_place";
                break;
            default :
                $sortColumn = "Id";
        }

        $query = "SELECT * FROM person ORDER BY $sortColumn";

        if (!$result = sqlite_unbuffered_query($db_lnk, $query)) {
            sqlite_close();
            echo 'Error occured: invalid query...<br>';
            echo "</body></html>";
            exit;
        }
        ?>

        <table>
            <tr>
                <td><a href="index.php?sortid=1">Id</a></td>
                <td><a href="index.php?sortid=2">First name</a></td>
                <td><a href="index.php?sortid=3">Last name</a></td>
                <td><a href="index.php?sortid=4">Year of birth</a></td>
                <td><a href="index.php?sortid=5">Place of birth</a></td>
            </tr>

            <?php
            while ($row = sqlite_fetch_array($result)) {
                echo "<tr>";
                echo "<td>$row[0]</td>";
                echo "<td>$row[1]</td>";
                echo "<td>$row[2]</td>";
                echo "<td>$row[3]</td>";
                echo "<td>$row[4]</td>";
                echo "</tr>";
            }
            sqlite_close($db_lnk);
            ?>
        </table>
    </body>
</html>