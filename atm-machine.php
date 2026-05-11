<?php

class ATMachine {
    private $balance = 0;
    private $pin = "1234";
    private $isAuthenticated = false;

    public function __construct($initialBalance, $pin) {
        $this->balance = $initialBalance;
        $this->pin = $pin;
    }

    public function authenticate($enteredPin) {
        if ($enteredPin == $this->pin) {
            $this->isAuthenticated = true;
            echo "Authentication successful!\n";
            return true;
        } else {
            echo "Invalid PIN!\n";
            return false;
        }
    }

    public function checkBalance() {
        if (!$this->isAuthenticated) {
            echo "Please authenticate first!\n";
            return null;
        }
        echo "Your balance: $" . $this->balance . "\n";
        return $this->balance;
    }

    public function withdraw($amount) {
        if (!$this->isAuthenticated) {
            echo "Please authenticate first!\n";
            return false;
        }

        if ($amount <= 0) {
            echo "Invalid amount!\n";
            return false;
        }

        $allowedNotes = [100, 200, 500];
        if (!in_array($amount, $allowedNotes)) {
            echo "Invalid amount! Only notes of $100, $200, or $500 can be withdrawn.\n";
            return false;
        }

        if ($amount > $this->balance) {
            echo "Insufficient funds!\n";
            return false;
        }

        $this->balance -= $amount;
        echo "Withdrawal successful! $" . $amount . " withdrawn.\n";
        return true;
    }

    public function deposit($amount) {
        if (!$this->isAuthenticated) {
            echo "Please authenticate first!\n";
            return false;
        }

        if ($amount <= 0) {
            echo "Invalid amount!\n";
            return false;
        }

        $this->balance += $amount;
        echo "Deposit successful! $" . $amount . " deposited.\n";
        return true;
    }

    public function logout() {
        $this->isAuthenticated = false;
        echo "Logged out successfully!\n";
    }
}

// Example usage:
$atm = new ATMachine(1000, "1234");
$atm->authenticate("1234");
$atm->checkBalance();
$atm->withdraw(200);
$atm->deposit(500);
$atm->checkBalance();
$atm->logout();

?>