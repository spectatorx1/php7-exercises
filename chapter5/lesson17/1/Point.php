<?php

class Point {

    public $x;
    public $y;

    public function setPointsXy($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function getPointX() {
        return $this->x;
    }

    public function getPointY() {
        return $this->y;
    }

}