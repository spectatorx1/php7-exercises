<?php

require_once "Person.php";

class User extends Person {

    public function setId($id) {
        $this->data['id'] = $id;
    }

    public function getId() {
        if (isSet($this->data['id'])) {
            return $this->data['id'];
        } else {
            return false;
        }
    }

}