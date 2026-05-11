<?php

declare(strict_types=1);

/*
Difficulty: Intermediate
Description:
- Dynamic Programming solution for minimum coins needed to make a target amount.

When to Use:
- Need minimum/maximum with repeated subproblems.
- Brute force recursion is too slow.
Time Complexity:
- O(amount * number_of_coins)

Space Complexity:
- O(amount)

Avoid When:
- Greedy is proven optimal for your specific coin system and you only need speed.
*/

function minCoins(array $coins, int $amount): int
{
    $max = $amount + 1;
    $dp = array_fill(0, $amount + 1, $max);
    $dp[0] = 0;

    for ($value = 1; $value <= $amount; $value++) {
        foreach ($coins as $coin) {
            if ($coin <= $value) {
                $dp[$value] = min($dp[$value], $dp[$value - $coin] + 1);
            }
        }
    }

    return $dp[$amount] > $amount ? -1 : $dp[$amount];
}

$coins = [1, 2, 5];
$amount = 11;
echo "Minimum coins: " . minCoins($coins, $amount) . PHP_EOL;
