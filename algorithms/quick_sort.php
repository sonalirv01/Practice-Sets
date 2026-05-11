<?php

declare(strict_types=1);

/*
Difficulty: Intermediate
Description:
- Quick Sort chooses a pivot and partitions elements into less-than and greater-than groups recursively.

When to Use:
- Fast general-purpose in-memory sorting.
- Average-case performance matters (O(n log n)).
Time Complexity:
- Average: O(n log n), Worst: O(n^2)

Space Complexity:
- O(log n) average recursion stack

Avoid When:
- Need guaranteed worst-case O(n log n) without safeguards.
*/

function quickSort(array $arr): array
{
    if (count($arr) <= 1) {
        return $arr;
    }

    $pivot = $arr[array_key_last($arr)];
    $left = [];
    $right = [];

    for ($i = 0; $i < count($arr) - 1; $i++) {
        if ($arr[$i] <= $pivot) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }

    return array_merge(quickSort($left), [$pivot], quickSort($right));
}

$input = [10, 7, 8, 9, 1, 5];
$output = quickSort($input);

echo "Input:  " . implode(', ', $input) . PHP_EOL;
echo "Output: " . implode(', ', $output) . PHP_EOL;
