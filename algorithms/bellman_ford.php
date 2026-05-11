<?php

declare(strict_types=1);

/*
Difficulty: Advanced
Description:
- Bellman-Ford computes shortest paths from a source, including graphs with negative edge weights.
- It can also detect negative cycles.

When to Use:
- Weighted graph may contain negative edges.
- Need negative cycle detection.
Time Complexity:
- O(V * E)

Space Complexity:
- O(V)

Avoid When:
- All weights are non-negative and performance is critical (Dijkstra is faster).
*/

function bellmanFord(array $nodes, array $edges, string $source): array
{
    $dist = [];
    foreach ($nodes as $node) {
        $dist[$node] = INF;
    }
    $dist[$source] = 0.0;

    $n = count($nodes);

    for ($i = 0; $i < $n - 1; $i++) {
        $updated = false;

        foreach ($edges as [$u, $v, $w]) {
            if ($dist[$u] !== INF && $dist[$u] + $w < $dist[$v]) {
                $dist[$v] = $dist[$u] + $w;
                $updated = true;
            }
        }

        if (!$updated) {
            break;
        }
    }

    foreach ($edges as [$u, $v, $w]) {
        if ($dist[$u] !== INF && $dist[$u] + $w < $dist[$v]) {
            return ['hasNegativeCycle' => true, 'distances' => []];
        }
    }

    return ['hasNegativeCycle' => false, 'distances' => $dist];
}

$nodes = ['A', 'B', 'C', 'D'];
$edges = [
    ['A', 'B', 1],
    ['B', 'C', 3],
    ['A', 'C', 10],
    ['C', 'D', -2],
    ['B', 'D', 8],
];

$result = bellmanFord($nodes, $edges, 'A');

if ($result['hasNegativeCycle']) {
    echo 'Negative cycle detected' . PHP_EOL;
} else {
    print_r($result['distances']);
}
