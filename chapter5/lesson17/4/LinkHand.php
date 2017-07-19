<?php

class LinkHand {

    protected $link = "";

    function __construct($url, $description = "") {
        $this->setLink($url, $description);
    }

    function setLink($url, $description) {
        $link = "<a href=\"$url\">";
        if ($description == "") {
            $link .= $url;
        } else {
            $link .= $description;
        }
        $link .= "</a>";
        $this->link = $link;
    }

    function getLink() {
        return $this->link;
    }

}