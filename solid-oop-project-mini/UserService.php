<?php
// `UserService.php`
class UserService {
    public function __construct(private User $user) {}

    public function accessFeature(string $feature): void {
        if ($this->user->hasRole('admin') && in_array($feature, $this->user->getPermissions())) {
            echo "Access granted to $feature\n";
        } else {
            echo "Access denied to $feature\n";
        }
    }
}

?>