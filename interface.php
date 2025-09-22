<?php 
/**
 * An interface in PHP is a contract that defines a set of methods that a class must implement.
 * Interfaces are used to specify what methods a class should have, without dictating how those methods should be implemented.
 * This allows for a consistent API across different classes, promoting code reusability and flexibility.
 *  Interfaces cannot contain properties or concrete methods (methods with implementation).
 * A class can implement multiple interfaces, which is a way to achieve multiple inheritance in PHP.
 */
// Example of interface in PHP
interface Logger {
    public function log($message);
}                                                           
interface FileHandler {
    public function open($filename);
    public function close();
}
class FileLogger implements Logger, FileHandler {
    private $file;

    public function log($message) {
        if ($this->file) {
            fwrite($this->file, $message . "\n");
        } else {
            echo "File is not open. Cannot log message.\n";
        }
    }

    public function open($filename) {
        $this->file = fopen($filename, 'a');
        if (!$this->file) {
            echo "Could not open file: $filename\n";
        }
    }

    public function close() {
        if ($this->file) {
            fclose($this->file);
            $this->file = null;
        }
    }
}
// Usage
$fileLogger = new FileLogger();
$fileLogger->open('log.txt');
$fileLogger->log('This is a log message.');
$fileLogger->close();       

?>