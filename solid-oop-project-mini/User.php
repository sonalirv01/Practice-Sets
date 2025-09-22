<?php
// `User.php`
abstract class User implements Authenticatable {
    protected string $name;
    protected string $email;
    protected string $password;

    use HasRoles, Logger;

    public function __construct($name, $email, $password) {
        $this->name     = $name;
        $this->email    = $email;
        $this->password = $password;
    }

    public function login(string $password): bool {
        if ($this->password === $password) {
            $this->log("User $this->email logged in.");
            return true;
        }
        return false;
    }

    abstract public function getPermissions(): array;
}

?>