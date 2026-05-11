<?php

declare(strict_types=1);

/*
Difficulty: Intermediate
Description:
- Dijkstra computes shortest paths from one source in a weighted graph with non-negative weights.

When to Use:
- Weighted graph.
- All edge weights are >= 0.
Time Complexity:
- O((V + E) log V)

Space Complexity:
- O(V)

Avoid When:
- Negative edge weights exist (use Bellman-Ford).
*/

function dijkstra(array $graph, string $source): array
{
    $dist = [];
    foreach ($graph as $node => $_) {
        $dist[$node] = INF;
    }
    $dist[$source] = 0.0;

    $pq = new SplPriorityQueue();
    $pq->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
    $pq->insert($source, 0.0);

    while (!$pq->isEmpty()) {
        $current = $pq->extract();
        $u = $current['data'];
        $currentDist = -$current['priority'];

        if ($currentDist > $dist[$u]) {
            continue;
        }

        foreach ($graph[$u] as $v => $weight) {
            $newDist = $dist[$u] + $weight;
            if ($newDist < $dist[$v]) {
                $dist[$v] = $newDist;
                // SplPriorityQueue is max-heap, so insert negative distance.
                $pq->insert($v, -$newDist);
            }
        }
    }

    return $dist;
}

$graph = [
    'A' => ['B' => 4, 'C' => 1],
    'B' => ['D' => 1],
    'C' => ['B' => 2, 'D' => 5],
    'D' => [],
];

print_r(dijkstra($graph, 'A'));
