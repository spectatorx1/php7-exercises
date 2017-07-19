<?php

echo "Last date of modification of a script: ";
echo date("d-m-Y H:i:s", filemtime('./5.php'));

//better solution:
//echo date("d-m-Y H:i:s", filemtime(__FILE__));