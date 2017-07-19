<?php

class User {

    protected $name, $id;

    public function setName($value) {
        $this->name = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($value) {
        $this->id = $value;
    }

    public function getId() {
        return $this->id;
    }

}

$user1 = new User();
$user2 = new User();

$user1->setName('j.smith');
$user2->setName('a.doe');

echo $user1->getName();
echo "<br>";
echo $user2->getName();