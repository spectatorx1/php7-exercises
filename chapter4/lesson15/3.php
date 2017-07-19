<?php

$cookieName = trim(strip_tags(filter_input(INPUT_COOKIE, 'name', FILTER_VALIDATE_STRING)));
$getName = trim(strip_tags(filter_input(INPUT_GET, 'name', FILTER_VALIDATE_STRING)));
if (!isset($cookieName) && !isset($getName)) {
    include "header.html";
    include "form.html";
    include "footer.html";
} else if (isset($getName)) {
    setcookie("name", $name, time() + 60 * 60 * 24 * 365);
    include "header.html";
    echo "<p>Thank you for completing the form.</p>";
    echo "<p><a href=\"3.php\">Redirect to homepage</a></p>";
    include "footer.html";
} else {
    include "header.html";
    echo "Your name is $name.";
    include "footer.html";
}