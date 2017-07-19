<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>DB</title>
    </head>
    <body>
        <?php
        if (!$db = mysqli_connect("localhost", "php", "test")) {
            echo 'Error on connection attempt...<br>';
            echo '</body></html>';
            exit();
        }

        if (!mysqli_select_db($db, 'testphp')) {
            mysqli_close($db);
            echo 'Error on database select: testphp <br>';
            echo '</body></html>';
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

        if (!$result = mysqli_query($db, $query)) {
            mysqli_close($db);
            echo 'Error occured: invalid query...<br>';
            echo '</body></html>';
            exit();
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
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr>";
                echo "<td>$row[0]</td>";
                echo "<td>$row[1]</td>";
                echo "<td>$row[2]</td>";
                echo "<td>$row[3]</td>";
                echo "<td>$row[4]</td>";
                echo "</tr>";
            }
            ?>

        </table>

        <?php
        if (!mysqli_close($db)) {
            echo 'Error on connection attempt...<br>';
        }
        ?>
    </body>
</html>