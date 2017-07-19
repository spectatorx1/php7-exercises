<?php
$uploaddir = './';

if ($_FILES['file1']['error'] == UPLOAD_ERR_OK) {
    $new_name = $uploaddir . $_FILES['file1']['name'];
    $temp_name = $_FILES['file1']['tmp_name'];
    if (move_uploaded_file($temp_name, $new_name)) {
        echo "File is loaded. These are its parameters: ";
        echo "<ul><li>original filename: {$_FILES['file1']['name']}</li>";
        echo "<li>temporary filename: {$_FILES['file1']['tmp_name']}</li>";
        echo "<li>size: {$_FILES['file1']['size']}</li>";
        if (isset($_FILES['file1']['type'])) {
            echo "<li>mime type: {$_FILES['file1']['type']}</li>";
        }
        echo "</ul>";
    } else {
        echo "Can't load a file.";
    }
} else {
    echo("Error occured: ");
    switch ($_FILES['file1']['error']) {
        case UPLOAD_ERR_INI_SIZE :
        case UPLOAD_ERR_FORM_SIZE :
            echo "Exceeded maximum filesize!";
            break;
        case UPLOAD_ERR_PARTIAL :
            echo "File partially uploaded!";
            break;
        case UPLOAD_ERR_NO_FILE :
            echo "File not uploaded!";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            echo "Can't access temporary directory";
            break;
        case UPLOAD_ERR_CANT_WRITE:
            echo "Can't save a file on server.";
            break;
        case UPLOAD_ERR_EXTENSION:
            echo "Loading a file via PHP extension.";
        default :
            echo("Unknown error type!\n");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form enctype = "multipart/form-data"
              action  = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
              method  = "post">
            <div>
                Filename:
                <input type="hidden" name="max_file_size" value="2097152">
                <input type="file"  name="file1" size="30">
                <input type="submit" name="send" value="Wyślij plik">
            </div>
        </form>
    </body>
</html>