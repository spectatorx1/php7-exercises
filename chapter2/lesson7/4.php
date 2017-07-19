<?php
  $time1 = microtime(true);

  //some example code, contents of a website
  for($i = 0; $i < 10000; $i++)
    for($j = 0; $j < 1000; $j++);

  $time2 = microtime(true);

  $time = $time2 - $time1;
  $arr = explode ('.', $time);

  $sec = $arr[0];
  $mic = $arr[1];

  echo "Site was generated in $sec seconds and $mic microseconds.";