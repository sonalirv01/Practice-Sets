<?php

declare(strict_types=1);

/*
Description:
- HackerRank-style coding examples that are frequently asked in online tests.

When to Use:
- Practice timed coding rounds and interview screening tasks.
*/

/*
Problem 1: Caesar Cipher
Time Complexity: O(n)
Space Complexity: O(n)
*/
function caesarCipher(string $s, int $k): string
{
    $k %= 26;
    $out = '';

    for ($i = 0; $i < strlen($s); $i++) {
        $ch = $s[$i];
        $ord = ord($ch);

        if ($ord >= 65 && $ord <= 90) {
            $out .= chr((($ord - 65 + $k) % 26) + 65);
        } elseif ($ord >= 97 && $ord <= 122) {
            $out .= chr((($ord - 97 + $k) % 26) + 97);
        } else {
            $out .= $ch;
        }
    }

    return $out;
}

/*
Problem 2: Balanced Brackets
Time Complexity: O(n)
Space Complexity: O(n)
*/
function isBalanced(string $s): bool
{
    $stack = [];
    $pairs = [')' => '(', ']' => '[', '}' => '{'];

    foreach (str_split($s) as $ch) {
        if (in_array($ch, ['(', '[', '{'], true)) {
            $stack[] = $ch;
            continue;
        }

        if (isset($pairs[$ch])) {
            if (empty($stack) || array_pop($stack) !== $pairs[$ch]) {
                return false;
            }
        }
    }

    return empty($stack);
}

/*
Problem 3: Left Rotation of Array by K
Time Complexity: O(n)
Space Complexity: O(n)
*/
function leftRotate(array $arr, int $k): array
{
    $n = count($arr);
    if ($n === 0) {
        return [];
    }

    $k %= $n;
    return array_merge(array_slice($arr, $k), array_slice($arr, 0, $k));
}

/*
Problem 4: Minimum Swaps to Sort
Time Complexity: O(n log n)
Space Complexity: O(n)
*/
function minimumSwaps(array $arr): int
{
    $n = count($arr);
    $pairs = [];

    for ($i = 0; $i < $n; $i++) {
        $pairs[] = ['value' => $arr[$i], 'index' => $i];
    }

    usort($pairs, static fn(array $a, array $b): int => $a['value'] <=> $b['value']);

    $visited = array_fill(0, $n, false);
    $swaps = 0;

    for ($i = 0; $i < $n; $i++) {
        if ($visited[$i] || $pairs[$i]['index'] === $i) {
            continue;
        }

        $cycle = 0;
        $j = $i;

        while (!$visited[$j]) {
            $visited[$j] = true;
            $j = $pairs[$j]['index'];
            $cycle++;
        }

        if ($cycle > 1) {
            $swaps += $cycle - 1;
        }
    }

    return $swaps;
}

// ---------------- Demo ----------------
echo 'Caesar Cipher: ' . caesarCipher('middle-Outz', 2) . PHP_EOL;
echo 'Balanced Brackets ({[()]}): ' . (isBalanced('{[()]}') ? 'Yes' : 'No') . PHP_EOL;

echo 'Left Rotate [1,2,3,4,5] by 2: ';
print_r(leftRotate([1, 2, 3, 4, 5], 2));

echo 'Minimum Swaps [4,3,1,2]: ' . minimumSwaps([4, 3, 1, 2]) . PHP_EOL;
