<?php

declare(strict_types=1);

/*
Difficulty: Beginner
Description:
- Binary Search finds a target in a sorted array by repeatedly cutting the search interval in half.

When to Use:
- Data is sorted.
- Need fast lookup with O(log n).
Time Complexity:
- O(log n)

Space Complexity:
- O(1)

Avoid When:
- Data is unsorted and you cannot sort first.
*/

function binarySearch(array $sorted, int $target): int
{
    $low = 0;
    $high = count($sorted) - 1;

    while ($low <= $high) {
        $mid = intdiv($low + $high, 2);

        if ($sorted[$mid] === $target) {
            return $mid;
        }

        if ($sorted[$mid] < $target) {
            $low = $mid + 1;
        } else {
            $high = $mid - 1;
        }
    }

    return -1;
}

$input = [2, 4, 6, 8, 10, 12, 14];
$target = 10;
$index = binarySearch($input, $target);

echo "Array:  " . implode(', ', $input) . PHP_EOL;
echo "Target: {$target}" . PHP_EOL;
echo "Index:  {$index}" . PHP_EOL;
