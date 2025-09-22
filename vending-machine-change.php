<?php
function vendingChange($change, $coins = [100,50,20, 10, 5, 1]) {
    $result = [];
    foreach ($coins as $coin) {
        $count = intdiv($change, $coin);
        $change %= $coin;
        if ($count > 0) $result[$coin] = $count;
    }
    return $result;
}
echo"Please enter the change amount: ";
$input = readline();
while(true){
    if(!is_numeric($input) || intval($input) != $input || $input < 0){
        echo "Invalid input. Please enter a non-negative integer value.\n";
        echo "Please enter the change amount: ";
        $input = readline();
        continue;
    }
    break;
} 
echo "To provide change for $input, use the following coins:\n";
print_r(vendingChange($input));
echo "\n";

?>