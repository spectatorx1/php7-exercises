<?php

class Container {

    protected $tab = array(100, 200, 300, 400);

    public function getElement($index) {
        if (!is_numeric($index)) {
            throw new InvalidArgumentException("Invalid argument");
        }
        $index = (integer) $index;
        if (!isSet($this->tab[$index])) {
            throw new InvalidArgumentException("Invalid argument");
        } else {
            return $this->tab[$index];
        }
    }

    public function setElement($index, $value) {
        if (!is_numeric($index)) {
            throw new InvalidArgumentException("Invalid argument \$index.");
        }

        if (!is_numeric($value)) {
            throw new InvalidArgumentException("Invalid argument \$value.");
        }

        $index = (integer) $index;
        $value = (integer) $value;

        if ($index < 0) {
            throw new InvalidArgumentException("Invalid argument \$index < 0.");
        }

        $this->tab[$index] = $value;
    }

}

$container = new Container();

$argc = $_SERVER['argc'];

if ($argc != 2 && $argc != 3) {
    echo "Call: php index.php index\n";
    echo "or\n";
    echo "php index.php index value\n";
    exit();
} else if ($argc == 2) {
    $index = $_SERVER['argv'][1];

    try {
        $val = $container->getElement($index);
    } catch (InvalidArgumentException $e) {
        echo "Error: ", $e->getMessage();
        exit();
    }
    echo("Element of index $index is $val.");
} else {
    $index = $_SERVER['argv'][1];
    $value = $_SERVER['argv'][2];

    try {
        $container->setElement($index, $value);
    } catch (InvalidArgumentException $e) {
        echo "Error: ", $e->getMessage();
        exit();
    }

    echo "Element of index $index was set to: ";
    echo $container->getElement($index);
    echo "\n";
}