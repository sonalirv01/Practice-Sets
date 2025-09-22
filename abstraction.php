<?php
/**
 * Abstraction in PHP is a concept where you define the structure of a class without providing a complete implementation.
 * It allows you to declare abstract classes and abstract methods, which must be implemented by child classes.
 * Abstract classes cannot be instantiated directly.
 */

// Example of abstraction in PHP
abstract class Animal {
    // Abstract method (no implementation here)
    abstract public function makeSound();

    // Concrete method
    public function eat() {
        echo "This animal is eating.\n";
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Woof!\n";
    }
}

// Usage
$dog = new Dog();
$dog->makeSound(); // Outputs: Woof!
$dog->eat();       // Outputs: This animal is eating.
?>