<?php
/**
 * Inheritance in PHP is a mechanism where a class (child or subclass) can inherit properties and methods from another class (parent or superclass).
 * This allows code reuse and establishes a relationship between classes.
 * 
 * Example:
 */
class Animal {
    public function move() {
        echo "Moving...\n";
    }
}

class Bird extends Animal {
    public function fly() {
        echo "Flying...\n";
    }
}

$b = new Bird();
$b->move(); // Inherited
$b->fly();  // Own method


?>