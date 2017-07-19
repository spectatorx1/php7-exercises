<?php

//show do...while loop being executed at least once
$i = 0;
echo "Initial value of \$i is 0, these are listed with use of do...while loop:<br>";
do {
    echo "\$i = $i";
    echo "<br>";
    $i++;
} while ($i <= 9);