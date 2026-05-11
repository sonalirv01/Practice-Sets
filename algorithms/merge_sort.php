<?php

declare(strict_types=1);

/*
Difficulty: Intermediate
Description:
- Merge Sort uses divide and conquer: split array, sort both halves, and merge them.

When to Use:
- Need stable sorting.
- Need predictable O(n log n) performance.
Time Complexity:
- O(n log n)

Space Complexity:
- O(n)

Avoid When:
- Extra memory usage is a hard constraint.
*/

function mergeSort(array $arr): array
{
    $n = count($arr);
    if ($n <= 1) {
        return $arr;
    }

    $mid = intdiv($n, 2);
    $left = mergeSort(array_slice($arr, 0, $mid));
    $right = mergeSort(array_slice($arr, $mid));

    return merge($left, $right);
}

function merge(array $left, array $right): array
{
    $result = [];
    $i = 0;
    $j = 0;

    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] <= $right[$j]) {
            $result[] = $left[$i++];
        } else {
            $result[] = $right[$j++];
        }
    }

    while ($i < count($left)) {
        $result[] = $left[$i++];
    }

    while ($j < count($right)) {
        $result[] = $right[$j++];
    }

    return $result;
}

$input = [38, 27, 43, 3, 9, 82, 10];
$output = mergeSort($input);

echo "Input:  " . implode(', ', $input) . PHP_EOL;
echo "Output: " . implode(', ', $output) . PHP_EOL;
