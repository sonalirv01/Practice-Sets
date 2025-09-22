<?php
/**
 * Encapsulation in PHP is an object-oriented programming concept
 * where the internal state (properties) of an object is hidden from
 * outside access and can only be modified through public methods.
 * This is typically achieved using access modifiers like private,
 * protected, and public.
 */
class BankAccount {
    private $balance = 2000;

    public function deposit($amount) {
        if ($amount > 0) $this->balance += $amount;
    }

    public function getBalance() {
        return $this->balance;
    }
}

$acc = new BankAccount();

$amount = (int)readline("Enter amount to deposit: ");
$acc->deposit($amount);
echo $acc->getBalance(); // 1000


?>