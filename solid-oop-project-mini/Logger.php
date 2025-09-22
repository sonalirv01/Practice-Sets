<?php
// `Logger.php`
trait Logger {
    public function log(string $msg) {
        echo "[LOG] $msg\n";
    }
}

?>