<?php

class Person {

    public $data = array('first_name' => "", 'last_name' => '');

    public function setFirst_name($first_name) {
        $this->data['first_name'] = $first_name;
    }

    public function setLast_name($last_name) {
        $this->data['last_name'] = $last_name;
    }

    public function getFirst_name() {
        return $this->data['first_name'];
    }

    public function getLast_name() {
        return $this->data['last_name'];
    }

}