<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PhpOOP</title>
    </head>
    <body>
        <p>Welcome</p>
        <div>
            <?php
            require "Links.php";

            $links = new Links();
            $links->getFromFile("./links.txt");
            echo $links->getAllLinksAsList();
            ?> 
        </div>
    </body>
</html>