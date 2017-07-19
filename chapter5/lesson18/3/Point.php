<?php

class Point {

    public $x, $y;

    public static function newPoint() {
        $point = new Point();
        $point . setXY(0, 0);
        return $point;
    }

    public function setX($x) {
        $this->x = $x;
    }

    public function setY($y) {
        $this->y = $y;
    }

    public function setXY($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX() {
        return $this->x;
    }

    public function getY() {
        return $this->y;
    }

}