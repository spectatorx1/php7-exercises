<?php

require "LinkHand.php";

class Links {

    protected $links = null;

    function __construct() {
        $link = array();
    }

    function getFromFile($file) {
        if (!($fd = @fopen($file, "r"))) {
            return false;
        }

        while (!feof($fd)) {
            $line = trim(fgets($fd));
            if (!($pos = strpos($line, ' '))) {
                $link = $line;
                $desc = $line;
            } else {
                $link = substr($line, 0, $pos);
                $desc = substr($line, $pos + 1);
            }
            $this->add(new Link($link, $desc));
        }
        fclose($fd);
    }

    function add($link) {
        $this->links[] = $link;
    }

    function getAllLinks($delimiter = "<br />") {
        $str = "";
        foreach ($this->links as $val) {
            $str .= $str . $delimiter;
        }
        return $str;
    }

    function getAllLinksAsList() {
        $str = "<ul>";
        foreach ($this->links as $val) {
            $link = $val->getLink();
            $str .= "<li>" . $link . "</li>";
        }
        $str .= "</ul>";
        return $str;
    }

}