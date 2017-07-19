<?php
$uploaddir = './';

if ($_FILES['file1']['error'] == UPLOAD_ERR_OK) {
    $new_name = $uploaddir . $_FILES['file1']['name'];
    $temp_name = $_FILES['file1']['tmp_name'];
    if (move_uploaded_file($temp_name, $new_name)) {
        echo "File is uploaded and available here: ";
        echo "<a href='$new_name'>{$_FILES['file1']['name']}</a>";
    } else {
        echo "Can't load a file.\n";
    }
} else {
    echo "Error occured: ";
    switch ($_FILES['file1']['error']) {
        case UPLOAD_ERR_INI_SIZE :
        case UPLOAD_ERR_FORM_SIZE :
            echo "Exceeded maximum file size!";
            break;
        case UPLOAD_ERR_PARTIAL :
            echo "File partially uploaded!";
            break;
        case UPLOAD_ERR_NO_FILE :
            echo "File is not uploaded!";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            echo "Can't access temporary directory";
            break;
        case UPLOAD_ERR_CANT_WRITE:
            echo "Can't save a file";
            break;
        case UPLOAD_ERR_EXTENSION:
            echo "Loading a file interrupted by PHP extension";
        default :
            echo("Unknown type of error!\n");
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