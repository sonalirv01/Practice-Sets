<?php
function minNotes($amount, $denominations = [1000, 500, 200, 100]) {
    if ($amount % 100 !== 0) return "Amount must be multiple of 100";
    $countNotes = [];
    foreach ($denominations as $note) {
        $count = intdiv($amount, $note);
        $amount %= $note;
        if ($count > 0) {
            $countNotes[$note] = $count;
        }
    }
    if ($amount > 0) return "Cannot dispense exact amount";
    return $countNotes;
}

// Example


echo "Enter a value: ";
$input = readline();
while (true) {
    if (!is_numeric($input) || intval($input) != $input) {
        echo "Invalid input. Please enter an integer value.\n";
        echo "Enter a value: ";
        $input = readline();
        continue;
    }
    break;
}
echo "You entered: " . $input . PHP_EOL;
print_r(minNotes($input));
echo "\n";
?>