<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Session</title>
    </head>
    <body>
        <p>
            <?php
            $uploaddir = './';
            $filesLimit = 3;

            if (!isset($_SESSION['uploads'])) {
                $_SESSION['uploads'] = 0;
            } else if ($_SESSION['uploads'] >= $filesLimit) {
                echo("Too many files ($filesLimit).");
                echo("</p></body></html>");
                exit();
            }


            if ($_FILES['plik1']['error'] == UPLOAD_ERR_OK) {
                $new_name = $uploaddir . $_FILES['file1']['name'];
                $temp_name = $_FILES['file1']['tmp_name'];
                if (move_uploaded_file($temp_name, $new_name)) {
                    echo "File uploaded and available here: ";
                    echo "<a href='$new_name'>{$_FILES['file1']['name']}</a>";

                    $_SESSION['uploads'] ++;
                    echo "<br>Number of files uploaded during this session: {$_SESSION['uploads']}/$filesLimit";
                } else {
                    echo "Unable to load file.\n";
                }
            } else {
                echo "Error: ";
                switch ($_FILES['file1']['error']) {
                    case UPLOAD_ERR_INI_SIZE :
                    case UPLOAD_ERR_FORM_SIZE :
                        echo "Too big file!";
                        break;
                    case UPLOAD_ERR_PARTIAL :
                        echo "File partially uploaded!";
                        break;
                    case UPLOAD_ERR_NO_FILE :
                        echo "File not downloaded!";
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        echo "Access denied to temp folder";
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        echo "Can't write a file on server";
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        echo "File upload interrupted by PHP extension";
                    default :
                        echo("Unknown error!\n");
                }
            }
            ?>
        </p>
    </body>
</html>