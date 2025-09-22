<?php
// `Admin.php`
class Admin extends User {
    public function getPermissions(): array {
        return ['read', 'write', 'delete'];
    }
}

?>