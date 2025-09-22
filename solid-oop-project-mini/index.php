<?php

// index.php

require_once 'Authenticatable.php';
require_once 'HasRoles.php';
require_once 'Logger.php';
require_once 'User.php';
require_once 'Admin.php';
require_once 'Customer.php';
require_once 'UserService.php';

$admin = new Admin("Richa", "richa@example.com", "pass123");
$admin->addRole("admin");

if ($admin->login("pass123")) {
    $service = new UserService($admin);
    $service->accessFeature("delete");
}


?>