<?php
session_start();
$message = false;
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>DB</title>
        <style>
            #wrapper{
                width:300px;
            }
            div label{
                float:left;
            }
            div input{
                float:right;
            }
            div br{
                clear:both;
            }
        </style>
    </head>
    <body>
        <?php if ($message): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
        <form name='form1' method='post' action='addrecord.php'>
            <div id="wrapper">
                <label for="id">Id</label> <input type='text' name='id' name='id'><br>
                <label for="fname">First name</label> <input type='text' name='fname'><br>
                <label for="lname">Last name</label> <input type='text' name='lname'><br>
                <label for="byear">Year of birth</label> <input type='text' name='byear'><br>
                <label for="bplace">Place of birth</label> <input type='text' name='bplace'><br>
                <input type='submit' value='Send'>
            </div>
        </form>
    </body>
</html>