<?php

declare(strict_types=1);

/*
Difficulty: Advanced
Description:
- Floyd-Warshall computes all-pairs shortest paths in O(V^3).

When to Use:
- Need shortest distances between every pair of nodes.
- Graph is relatively small.
Time Complexity:
- O(V^3)

Space Complexity:
- O(V^2)

Avoid When:
- Graph is large (O(V^3) is expensive).
*/

function floydWarshall(array $nodes, array $edges): array
{
    $dist = [];

    foreach ($nodes as $i) {
        foreach ($nodes as $j) {
            $dist[$i][$j] = ($i === $j) ? 0.0 : INF;
        }
    }

    foreach ($edges as [$u, $v, $w]) {
        $dist[$u][$v] = min($dist[$u][$v], $w);
    }

    foreach ($nodes as $k) {
        foreach ($nodes as $i) {
            foreach ($nodes as $j) {
                if ($dist[$i][$k] !== INF && $dist[$k][$j] !== INF) {
                    $dist[$i][$j] = min($dist[$i][$j], $dist[$i][$k] + $dist[$k][$j]);
                }
            }
        }
    }

    return $dist;
}

$nodes = ['A', 'B', 'C'];
$edges = [
    ['A', 'B', 4],
    ['A', 'C', 11],
    ['B', 'C', 2],
];

print_r(floydWarshall($nodes, $edges));
