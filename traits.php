<?php
/**
 * Traits in PHP are a mechanism for code reuse in single inheritance languages like PHP.       
 * They allow you to create reusable sets of methods that can be included in multiple classes.
 * Traits help to reduce code duplication and promote better organization of code.
 * You can think of traits as a way to "mix in" functionality into classes without using
 *  inheritance. This is particularly useful when you want to share methods between classes that do not share a common parent class.
 * Traits can also include properties and can use other traits.
 * When to use traits:
 * - When you have methods that are needed in multiple classes but those classes do not share a common ancestor.
 * - When you want to avoid code duplication and promote code reuse.
 * - When you want to organize related methods together in a single place.
 */
// Example of traits in PHP
trait Logger {
    public function log($message) {
        echo "[LOG]: " . $message . "\n";
    }
}       
trait FileHandler {
    public function open($filename) {
        echo "Opening file: " . $filename . "\n";
    }

    public function close() {
        echo "Closing file.\n";
    }
}
class FileLogger {
    use Logger, FileHandler; // Using traits
}
// Usage
$fileLogger = new FileLogger();
$fileLogger->open('log.txt'); // Outputs: Opening file: log.txt
$fileLogger->log('This is a log message.'); // Outputs: [LOG]: This is a log message.
$fileLogger->close(); // Outputs: Closing file. 
?>