<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PhpOOP</title>
    </head>
    <body>
        <p>List of visits:</p>
        <div>
            <?php
            include "Stats.php";

            $statobj = new Stats("./stats.txt");

            if (($str = $statobj->readData()) === false) {
                echo "<p>List is not available.</p>";
            } else {
                echo $str;
            }
            $data = date("Y-m-d G:i");
            $addr = $_SERVER['REMOTE_ADDR'];
            if (isset($_SERVER['HTTP_USER_AGENT'])) {
                $agent = $_SERVER['HTTP_USER_AGENT'];
            } else {
                $agent = '';
            }
            $statobj->writeData($data, $addr, $agent);
            ?>
        </div>
    </body>
</html>