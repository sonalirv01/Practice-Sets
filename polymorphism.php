<?php
// Polymorphism allows objects of different classes to be treated as objects of a common parent class.
// Each subclass can provide its own implementation of a method defined in the parent class.

class Animal {
    public function makeSound() {
        echo "Some generic animal sound\n";
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Woof!\n";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Meow!\n";
    }
}

// Function that accepts any Animal and calls makeSound
function animalSound(Animal $animal) {
    $animal->makeSound();
}

$dog = new Dog();
$cat = new Cat();

animalSound($dog); // Outputs: Woof!
animalSound($cat); // Outputs: Meow!
?>