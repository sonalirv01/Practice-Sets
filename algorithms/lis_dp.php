<?php

declare(strict_types=1);

/*
Difficulty: Advanced
Description:
- LIS (Longest Increasing Subsequence) finds the maximum length strictly increasing subsequence.
- This implementation uses O(n^2) DP for clarity.

When to Use:
- Sequence optimization problems.
- Need increasing pattern length from ordered data.
Time Complexity:
- O(n^2)

Space Complexity:
- O(n)

Avoid When:
- Very large input and O(n^2) is too slow (use O(n log n) approach).
*/

function lisLength(array $nums): int
{
    $n = count($nums);
    if ($n === 0) {
        return 0;
    }

    $dp = array_fill(0, $n, 1);
    $best = 1;

    for ($i = 1; $i < $n; $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($nums[$j] < $nums[$i]) {
                $dp[$i] = max($dp[$i], $dp[$j] + 1);
            }
        }
        $best = max($best, $dp[$i]);
    }

    return $best;
}

$input = [10, 9, 2, 5, 3, 7, 101, 18];
echo 'LIS length: ' . lisLength($input) . PHP_EOL;
