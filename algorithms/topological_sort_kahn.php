<?php

declare(strict_types=1);

/*
Difficulty: Intermediate
Description:
- Topological Sort orders nodes in a Directed Acyclic Graph (DAG) so every edge u -> v puts u before v.
- Kahn's algorithm uses in-degree and a queue.

When to Use:
- Dependency ordering (course prerequisites, build order).
- Graph is a DAG.
Time Complexity:
- O(V + E)

Space Complexity:
- O(V)

Avoid When:
- Graph has cycles. Topological order does not exist.
*/

function topologicalSort(array $graph): array
{
    $inDegree = [];
    foreach ($graph as $u => $neighbors) {
        $inDegree[$u] = $inDegree[$u] ?? 0;
        foreach ($neighbors as $v) {
            $inDegree[$v] = ($inDegree[$v] ?? 0) + 1;
        }
    }

    $queue = new SplQueue();
    foreach ($inDegree as $node => $deg) {
        if ($deg === 0) {
            $queue->enqueue($node);
        }
    }

    $order = [];
    while (!$queue->isEmpty()) {
        $u = $queue->dequeue();
        $order[] = $u;

        foreach ($graph[$u] ?? [] as $v) {
            $inDegree[$v]--;
            if ($inDegree[$v] === 0) {
                $queue->enqueue($v);
            }
        }
    }

    if (count($order) !== count($inDegree)) {
        return [];
    }

    return $order;
}

$graph = [
    'Math1' => ['Math2'],
    'Math2' => ['Algorithms'],
    'English' => [],
    'Algorithms' => [],
];

$order = topologicalSort($graph);
echo empty($order) ? 'Cycle detected' . PHP_EOL : implode(' -> ', $order) . PHP_EOL;
