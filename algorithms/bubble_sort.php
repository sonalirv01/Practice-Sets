<?php

declare(strict_types=1);

/*
Difficulty: Beginner
Description:
- Bubble Sort repeatedly compares adjacent elements and swaps them if they are in the wrong order.

When to Use:
- For learning sorting basics and understanding swap-based sorting.
- For very small arrays where performance is not important.
Time Complexity:
- Worst/Average: O(n^2), Best: O(n)

Space Complexity:
- O(1)

Avoid When:
- Input is medium/large. Time complexity is O(n^2).
*/

function bubbleSort(array $arr): array
{
    $n = count($arr);

    for ($i = 0; $i < $n - 1; $i++) {
        $swapped = false;

        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                [$arr[$j], $arr[$j + 1]] = [$arr[$j + 1], $arr[$j]];
                $swapped = true;
            }
        }

        if (!$swapped) {
            break;
        }
    }

    return $arr;
}

$input = [64, 34, 25, 12, 22, 11, 90];
$output = bubbleSort($input);

echo "Input:  " . implode(', ', $input) . PHP_EOL;
echo "Output: " . implode(', ', $output) . PHP_EOL;
