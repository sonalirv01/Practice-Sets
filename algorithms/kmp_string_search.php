<?php

declare(strict_types=1);

/*
Difficulty: Advanced
Description:
- KMP (Knuth-Morris-Pratt) searches for a pattern in text using a precomputed LPS array.
- It avoids re-checking characters, giving O(n + m) time.

When to Use:
- Need fast substring search with large text inputs.
- Repeated pattern matching where naive O(n*m) is slow.
Time Complexity:
- O(n + m)

Space Complexity:
- O(m) for LPS array

Avoid When:
- Input sizes are tiny and simplicity matters more than performance.
*/

function buildLps(string $pattern): array
{
    $lps = array_fill(0, strlen($pattern), 0);
    $len = 0;
    $i = 1;

    while ($i < strlen($pattern)) {
        if ($pattern[$i] === $pattern[$len]) {
            $len++;
            $lps[$i] = $len;
            $i++;
        } elseif ($len !== 0) {
            $len = $lps[$len - 1];
        } else {
            $lps[$i] = 0;
            $i++;
        }
    }

    return $lps;
}

function kmpSearch(string $text, string $pattern): array
{
    if ($pattern === '') {
        return [];
    }

    $lps = buildLps($pattern);
    $matches = [];

    $i = 0;
    $j = 0;

    while ($i < strlen($text)) {
        if ($text[$i] === $pattern[$j]) {
            $i++;
            $j++;
        }

        if ($j === strlen($pattern)) {
            $matches[] = $i - $j;
            $j = $lps[$j - 1];
        } elseif ($i < strlen($text) && $text[$i] !== $pattern[$j]) {
            if ($j !== 0) {
                $j = $lps[$j - 1];
            } else {
                $i++;
            }
        }
    }

    return $matches;
}

$text = 'ababcabcabababd';
$pattern = 'ababd';
$result = kmpSearch($text, $pattern);

echo 'Text: ' . $text . PHP_EOL;
echo 'Pattern: ' . $pattern . PHP_EOL;
echo 'Match indices: ' . implode(', ', $result) . PHP_EOL;
