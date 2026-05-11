<?php

declare(strict_types=1);

/*
Difficulty: Intermediate
Description:
- Sliding Window keeps a moving range to solve contiguous substring/subarray problems efficiently.
- This example finds the longest substring without repeating characters.

When to Use:
- Problem involves contiguous segments and constraints.
- Need O(n) over naive O(n^2).
Time Complexity:
- O(n)

Space Complexity:
- O(min(n, charset))

Avoid When:
- Problem is non-contiguous and does not benefit from a moving window.
*/

function longestUniqueSubstringLength(string $s): int
{
    $lastSeen = [];
    $left = 0;
    $best = 0;

    for ($right = 0; $right < strlen($s); $right++) {
        $ch = $s[$right];

        if (isset($lastSeen[$ch]) && $lastSeen[$ch] >= $left) {
            $left = $lastSeen[$ch] + 1;
        }

        $lastSeen[$ch] = $right;
        $best = max($best, $right - $left + 1);
    }

    return $best;
}

$input = 'abcabcbb';
$output = longestUniqueSubstringLength($input);

echo "Input:  {$input}" . PHP_EOL;
echo "Output: {$output}" . PHP_EOL;
