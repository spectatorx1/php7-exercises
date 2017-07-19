<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Image gallery</title>
    </head>
    <body>
        <?php
        $imgDir = "./images";

        if (isset($_GET['imgid'])) {
            $imgId = (int) $_GET['imgid'];
        } else {
            $imgId = 0;
        }

        $dir = scandir($imgDir);

        foreach ($dir as $key => $val) {
            if (!is_file("$imgDir/$val")) {
                unset($dir[$key]);
                continue;
            }

            $ext = substr($val, count($val) - 5, 5);
            $ext = strtolower($ext);

            if ($ext != '.jpg' && $ext != '.gif' && $ext != '.png') {
                unset($dir[$key]);
                continue;
            }
        }

        sort($dir);

        $count = count($dir);

        if ($count < 1) {
            echo "<p style=\"text-align:center\">Nothing to display, add files to show them.</p>";
            echo "</body></html>";
            exit();
        }

        if ($imgId < 0 || $imgId >= $count) {
            $imgId = 0;
        }

        $imgName = $dir["$imgId"];

        $first = 0;
        $last = $count - 1;
        if ($imgId < $count - 1) {
            $next = $imgId + 1;
        } else {
            $next = $count - 1;
        }

        if ($imgId > 0) {
            $prev = $imgId - 1;
        } else {
            $prev = 0;
        }

        $descrFileName = substr($imgName, 0, count($val) - 5);
        $descrFileName .= ".txt";

        if (file_exists("$imgDir/$descrFileName")) {
            if (($descr = file_get_contents("$imgDir/$descrFileName")) === false) {
                $descr = "No description.";
            }
        } else {
            $descr = "No description.";
        }
        ?>
        <div>
            <div id='image' style='text-align:center'>
                <?php
                echo "<img src=\"$imgDir/$imgName\" alt=\"$imgName\">";
                ?>
            </div>
            <div id='description' style='text-align:center'>
                <?php
                echo $descr;
                ?>
            </div>
            <div id='description' style='text-align:center'>
                <?php
                $imgId++;
                echo "Image $imgName ($imgId z $count)";
                ?>
            </div>
            <div id='navigation' style='text-align:center'>
                <?php
                echo "<a href=\"gallery.php?imgid=$first\">First</a> ";
                echo "<a href=\"gallery.php?imgid=$prev\">Previous</a> ";
                echo "<a href=\"gallery.php?imgid=$next\">Next</a> ";
                echo "<a href=\"gallery.php?imgid=$last\">Last</a> ";
                ?>
            </div>
        </div>
    </body>
</html>