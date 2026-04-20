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
    /* A concrete method is a method that has an implementation (a body) and can be called directly.
    *  In your file eat() is a concrete method because it contains code (echo "This animal is eating.\n";).
    * That contrasts with an abstract method (like makeSound()), which declares a signature but no body and must be implemented by subclasses.

        // Quick notes / gotchas:

        // Abstract classes can contain both abstract and concrete methods.
        // Concrete methods in an abstract class can be inherited and optionally overridden by subclasses.
        // When overriding, visibility must be the same or less restrictive (e.g., protected -> public is allowed).
        // You cannot instantiate an abstract class directly.
        // Prefer PHP_EOL instead of "\n" for portability; consider return type : void in modern PHP.
        // Suggested small improvement (add return type and PHP_EOL, remove closing PHP tag if file is pure PHP):
    */


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