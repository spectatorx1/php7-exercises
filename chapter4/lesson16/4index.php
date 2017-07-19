<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Session</title>
    </head>
    <body>
        <form enctype = "multipart/form-data"
              action  = "4upload.php"
              method  = "post">
            <div>
                File name:
                <input type="hidden" name="max_file_size" value="2097152">
                <input type="file"  name="file1" size="30">
                <input type="submit" name="sendf" value="Send file">
            </div>
        </form>
    </body>
</html>