<?php

declare(strict_types=1);

/*
Difficulty: Intermediate
Description:
- 0/1 Knapsack DP finds max value that fits within capacity where each item can be chosen at most once.

When to Use:
- Need optimal selection under weight/capacity constraints.
- Items are discrete (take or skip).
Time Complexity:
- O(n * capacity)

Space Complexity:
- O(capacity)

Avoid When:
- Items are divisible (use Fractional Knapsack greedy).
*/

function knapsack01(array $weights, array $values, int $capacity): int
{
    $n = count($weights);
    $dp = array_fill(0, $capacity + 1, 0);

    for ($i = 0; $i < $n; $i++) {
        for ($w = $capacity; $w >= $weights[$i]; $w--) {
            $dp[$w] = max($dp[$w], $dp[$w - $weights[$i]] + $values[$i]);
        }
    }

    return $dp[$capacity];
}

$weights = [1, 3, 4, 5];
$values = [1, 4, 5, 7];
$capacity = 7;

echo "Max value: " . knapsack01($weights, $values, $capacity) . PHP_EOL;
