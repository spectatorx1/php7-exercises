<?php

class ExceptionResult extends Exception {
    
}

class Container {

    protected $tab = array(100, 200, 300, 400);

    public function getElement($index) {
        if (!is_numeric($index)) {
            throw new InvalidArgumentException("Invalid argument.");
        }
        $index = (integer) $index;
        if (!isSet($this->tab[$index])) {
            throw new InvalidArgumentException("Invalid argument.");
        } else {
            $exc = new ExceptionResult("Result is", $this->tab[$index]);
            throw $exc;
        }
    }

}

if ($_SERVER['argc'] < 2) {
    exit("Provide value of index!");
}

$container = new Container();

$index = $_SERVER['argv'][1];

try {
    $val = $container->getElement($index);
} catch (InvalidArgumentException $e) {
    echo "Error: ", $e->getMessage();
    exit();
} catch (ExceptionResult $e) {
    echo "Element of index $index is ";
    echo $e->getCode();
}