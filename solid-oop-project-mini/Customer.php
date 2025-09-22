<?php
// `Customer.php`
class Customer extends User {
    public function getPermissions(): array {
        return ['read'];
    }
}

?>