<?php
interface Authenticatable {
    public function login(string $password): bool;
}

?>