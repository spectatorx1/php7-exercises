<?php
//  if(isset($_POST['opinions']) && $_POST['opinions'] != ""){
//    $str = substr($_POST['opinions'], 0, 255);
//    $str = trim(strip_tags($str));
//    if($str != ""){
//      file_put_contents("./opinions.txt", "$str\n", FILE_APPEND);
//      header('Location:thanks.html');
//    } else {
//      header('Location:invalid_input.html');
//    }
//  } else {
//    header('Location:missing_data.html');
//  }

$opinions = trim(strip_tags(filter_input(INPUT_POST, 'opinions', FILTER_SANITIZE_STRING)));
if (isset($opinions) && $opinions != "") {
    $strf = substr($opinions, 0, 255);
    $str = trim(strip_tags($strf));
    if ($str != "") {
        $old_str = file_get_contents("./opinions.txt");
        file_put_contents("./opinions.txt", "$str\n");
        file_put_contents("./opinions.txt", "$old_str", FILE_APPEND);
        header('Location:thanks.html');
    } else {
        header('Location:invalid_input.html');
    }
} else {
    header('Location:missing_data.html');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div>
            <strong>Express your opinion:</strong><br>
            (up to 255 characters)
            <br>
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div>
                <textarea rows="5" cols="20" name="opinions"></textarea>
                <br>
                <input type="submit" value="Send">
            </div>
        </form>
        <p>Dotychczasowe opinie:</p>
        <div>
            <?php
            $str = "";
            if (file_exists("./opinions.txt")) {
                $str = file_get_contents('./opinions.txt');
                $str1 = strip_tags($str);
                $str2 = nl2br($str1);
            }
            if ($str != "") {
                echo $str;
            } else {
                echo "<p>No opinions yet, add yours.</p>";
            }
            ?>
        </div>
    </body>
</html>