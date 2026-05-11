<?php

declare(strict_types=1);

/*
Difficulty: Beginner
Description:
- Insertion Sort builds a sorted section one element at a time by inserting each element into the correct position.

When to Use:
- Small arrays.
- Nearly sorted input (can be close to O(n)).
Time Complexity:
- Worst/Average: O(n^2), Best: O(n)

Space Complexity:
- O(1)

Avoid When:
- Large random arrays. Worst-case is O(n^2).
*/

function insertionSort(array $arr): array
{
    $n = count($arr);

    for ($i = 1; $i < $n; $i++) {
        $key = $arr[$i];
        $j = $i - 1;

        while ($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }

        $arr[$j + 1] = $key;
    }

    return $arr;
}

$input = [12, 11, 13, 5, 6];
$output = insertionSort($input);

echo "Input:  " . implode(', ', $input) . PHP_EOL;
echo "Output: " . implode(', ', $output) . PHP_EOL;
