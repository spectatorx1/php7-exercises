<?php

function getBrowserType() {
    if (!isset($_SERVER['HTTP_USER_AGENT'])) {
        return("unknown");
    }

    $browser_info = strtolower($_SERVER['HTTP_USER_AGENT']);

    if (strpos($browser_info, "opera") !== false) {
        return("opera");
    } else if (strpos($browser_info, "chrome") !== false) {
        return("chrome");
    } else if (strpos($browser_info, "msie") !== false) {
        return("msie");
    } else if (strpos($browser_info, "firefox") !== false) {
        return("firefox");
    } else if (strpos($browser_info, "vivaldi") !== false) {
        return("vivaldi");
    } else if (strpos($browser_info, "edge") !== false) {
        return("edge");
    } else {
        return("unknown");
    }
}

include getBrowserType() . ".html";