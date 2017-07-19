<?php

class Stats {

    public $stat_file = "";

    function __construct($stat_file) {
        $this->stat_file = $stat_file;
    }

    function writeData($data, $addr, $agent) {
        $file_str = "";
        if (file_exists($this->stat_file)) {
            if (($file_str = file_get_contents($this->stat_file)) === false) {
                return false;
            }
        }
        if (!$fd = fopen($this->stat_file, "w")) {
            return false;
        }

        $str = "$data $addr $agent\n";

        fwrite($fd, $str);
        fwrite($fd, $file_str);
        fclose($fd);
        return true;
    }

    function readData() {
        if (!$fd = fopen($this->stat_file, "r")) {
            return false;
        }

        $result = "<ol>";
        while (!feof($fd)) {
            if (($str = fgets($fd)) != "") {
                $result .= "<li>$str</li>";
            }
        }
        $result .= "</ol>";
        return $result;
    }

}