<?php

class Counter {

    public $file = "";

    function __construct($file) {
        $this->file = $file;
    }

    function getAndUpdate() {
        if (!file_exists($this->file)) {
            return false;
        }
        if (!$fd = fopen($this->file, "r+")) {
            return false;
        }
        flock($fd, LOCK_EX);
        $count = fgets($fd);
        if (is_numeric($count)) {
            $result = $count + 1;
            fseek($fd, 0);
            fputs($fd, $result);
        } else {
            $result = false;
        }
        flock($fd, LOCK_UN);
        fclose($fd);
        return $result;
    }

}