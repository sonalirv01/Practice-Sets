<?php

declare(strict_types=1);


/*
Difficulty: Intermediate
Description: 
- Activity Selection greedily picks activities with earliest finishing time to maximize non-overlapping activities.

When to Use:
- Scheduling non-overlapping intervals.
- Greedy strategy is proven correct.
Time Complexity:
- O(n log n) due to sorting

Space Complexity:
- O(1) extra (excluding output list)

Avoid When:
- Problem requires weighted intervals (use DP variant).
*/

function maxNonOverlappingActivities(array $activities): array
{
    usort($activities, static fn(array $a, array $b): int => $a[1] <=> $b[1]);

    $selected = [];
    $lastEnd = -INF;

    foreach ($activities as $activity) {
        [$start, $end] = $activity;
        if ($start >= $lastEnd) {
            $selected[] = $activity;
            $lastEnd = $end;
        }
    }

    return $selected;
}

$activities = [[1, 3], [2, 5], [4, 7], [1, 8], [8, 10], [9, 11]];
$result = maxNonOverlappingActivities($activities);

echo "Selected activities:" . PHP_EOL;
foreach ($result as [$s, $e]) {
    echo "[{$s}, {$e}]" . PHP_EOL;
}
