<?php

function atmWithdraw($amount) {
    // Available note denominations
    $notes = [1000, 500, 200, 100];
    $result = [];

    // Check if amount is valid (multiple of 100)
    if ($amount % 100 !== 0) {
        return "Amount should be in multiples of 100.";
    }

    foreach ($notes as $note) {
        $count = intdiv($amount, $note); // number of notes of this denomination
        $amount = $amount % $note;       // remaining amount after dispensing this note

        if ($count > 0) {
            $result[$note] = $count;
        }
    }

    if ($amount > 0) {
        return "Cannot dispense the exact amount with available notes.";
    }

    return $result;
}

// Example usage
$withdrawAmount = 1200;
$dispensedNotes = atmWithdraw($withdrawAmount);

if (is_array($dispensedNotes)) {
    echo "To dispense $withdrawAmount, give notes:\n";
    foreach ($dispensedNotes as $note => $count) {
        echo "$note x $count\n";
    }
} else {
    echo $dispensedNotes; // error message
}
?>