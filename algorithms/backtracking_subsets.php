<?php

declare(strict_types=1);

/*
Difficulty: Intermediate
Description:
- Backtracking explores all choices recursively and reverts decisions to try other paths.
- This example generates all subsets (power set).

When to Use:
- Need all valid combinations/permutations.
- Can prune invalid branches early.
Time Complexity:
- O(n * 2^n)

Space Complexity:
- O(n) recursion stack (excluding output)

Avoid When:
- Input size is large and full search is too expensive.
*/

function allSubsets(array $nums): array
{
    $result = [];
    $path = [];

    $dfs = function (int $index) use (&$dfs, $nums, &$result, &$path): void {
        if ($index === count($nums)) {
            $result[] = $path;
            return;
        }

        $dfs($index + 1);

        $path[] = $nums[$index];
        $dfs($index + 1);
        array_pop($path);
    };

    $dfs(0);
    return $result;
}

print_r(allSubsets([1, 2, 3]));
