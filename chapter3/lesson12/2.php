<?php
//original code

/*

  <?php
  $stat_file = "./stats.txt";
  function writeData($stat_file)
  {
  $file_str = "";
  if(file_exists($stat_file)){
  if(($file_str = file_get_contents($stat_file)) === false){
  //Error on attempt to open a file
  return false;
  }
  }
  if(!$fd = fopen($stat_file, "w")){
  //Error on attempt to open a file
  return false;
  }
  $str = date("Y-m-d G:i")." ";
  $str .= $_SERVER['REMOTE_ADDR']." ";
  if(isset($_SERVER['HTTP_USER_AGENT'])){
  $str .= $_SERVER['HTTP_USER_AGENT'];
  }
  $str .= "\n";
  fwrite($fd, $str);
  fwrite($fd, $file_str);
  fclose($fd);
  return true;
  }

  function printData($stat_file)
  {
  if(!$fd = fopen($stat_file, "r")){
  //Error on attempt to open a file
  return false;
  }
  echo "<ol>";
  while (!feof($fd)){
  if(($str = fgets($fd)) != "")
  echo("<li>$str</li>");
  }
  echo "</ol>";
  return true;
  }

  writeData($stat_file);
  ?>

  <!DOCTYPE html>
  <html>
  <head>
  <meta charset="utf-8">
  <title></title>
  </head>
  <body>
  <p>Number of visits:</p>
  <div>
  <?php
  if(!printData($stat_file)){
  echo("<p>List is not available.</p>");
  }
  ?>
  </div>
  </body>
  </html>

 */

$stat_file = "./stats.txt";

function writeData($stat_file, $times) {
    $file_str = "";
    if (file_exists($stat_file)) {
        if (($arr = file($stat_file)) === false) {
            //Error on attempt to open a file
            return false;
        }
    }
    if (!$fd = fopen($stat_file, "w")) {
        //Error on attempt to open a file
        return false;
    }
    $str = date("Y-m-d G:i") . " ";
    $str .= $_SERVER['REMOTE_ADDR'] . " ";
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $str .= $_SERVER['HTTP_USER_AGENT'];
    }
    $str .= "\n";
    array_unshift($arr, $str);
    $count = count($arr);
    for ($i = 0; $i < $count && $i < $times; $i++) {
        fwrite($fd, $arr[$i]);
    }
    fclose($fd);
    return true;
}

function printData($stat_file) {
    if (!$fd = fopen($stat_file, "r")) {
        //Error on attempt to open a file
        return false;
    }
    echo "<ol>";
    while (!feof($fd)) {
        if (($str = fgets($fd)) != "") {
            echo("<li>$str</li>");
        }
    }
    echo "</ol>";
    return true;
}

writeData($stat_file, 10);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <p>Number of visits:</p>
        <div>
            <?php
            if (!printData($stat_file)) {
                echo("<p>List is not available.</p>");
            }
            ?>
        </div>
    </body>
</html>