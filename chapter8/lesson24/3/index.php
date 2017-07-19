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

            <?php
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

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

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo("<tr>");
                foreach ($row as $val) {
                    echo "<td>$val</td>";
                }
                echo("</tr>");
            }
            ?>

        </table>

        <?php
        if (!mysqli_close($db)) {
            echo 'Error on closing connection...<br>';
        }
        ?>
    </body>
</html>