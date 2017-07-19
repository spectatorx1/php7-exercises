<?php

function link2code($link) {
    if (preg_match("~^(ht|f)tps?://~i", $link)) {
        return "<a href=\"$link\">$link</a>";
    } else {
        echo('Please provide whole link with protocol part, for example: http://myawesomewebsite.com');
    }
}

echo link2code("http://127.0.0.1");