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
    use Logger, FileHandler {
        Logger::log as traitLog;
        FileHandler::open as traitOpen;
        FileHandler::close as traitClose;
    }

    protected $handle = null;
    protected $filename = '';
    protected $mode = 'a';
    protected $dateFormat = 'Y-m-d H:i:s';

    // Open file (overrides trait behavior to use real file handle)
    public function open($filename, $mode = 'a') {
        $this->filename = $filename;
        $this->mode = $mode;
        $this->handle = @fopen($filename, $mode);
        if ($this->handle === false) {
            throw new RuntimeException("Unable to open file: {$filename}");
        }
        // keep trait behavior (echo) for demonstration
        $this->traitOpen($filename);
        return true;
    }

    // Close file (overrides trait to close actual handle)
    public function close() {
        if ($this->handle && is_resource($this->handle)) {
            fflush($this->handle);
            fclose($this->handle);
            $this->handle = null;
        }
        // keep trait behavior (echo)
        $this->traitClose();
    }

    // Enhanced log: formats with timestamp, optional level, writes to both output and file
    public function log($message, $level = 'INFO') {
        $timestamp = date($this->dateFormat);
        $formatted = "[{$timestamp}] [{$level}]: {$message}";
        // use trait Logger to output (keeps existing echo behavior)
        $this->traitLog($formatted);
        // also write to file if open
        if ($this->handle && is_resource($this->handle)) {
            fwrite($this->handle, $formatted . PHP_EOL);
        }
    }

    // Optional helper to change date format
    public function setDateFormat($format) {
        $this->dateFormat = $format;
    }
}
// Usage
$fileLogger = new FileLogger();
$fileLogger->open('log.txt'); // Outputs: Opening file: log.txt
$fileLogger->log('This is a log message.'); // Outputs: [LOG]: This is a log message.
$fileLogger->close(); // Outputs: Closing file. 
?>