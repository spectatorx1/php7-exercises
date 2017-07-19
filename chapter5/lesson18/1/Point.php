<?php

class Point {

    public $x, $y;

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

class Point3D extends Point {

    public $z;

    public function setZ($z) {
        $this->z = $z;
    }

    public function setXYZ($x, $y, $z) {
        $this->setXY($x, $y);
        $this->z = $z;
    }

    public function getZ() {
        return $this->z;
    }

}