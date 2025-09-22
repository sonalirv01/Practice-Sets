<?php
// `HasRoles.php`
trait HasRoles {
    private array $roles = [];

    public function addRole(string $role) {
        $this->roles[] = $role;
    }

    public function hasRole(string $role): bool {
        return in_array($role, $this->roles);
    }
}

?>