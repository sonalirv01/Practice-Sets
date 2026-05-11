<?php

declare(strict_types=1);

/*
Difficulty: Intermediate
Description:
- Breadth-First Search (BFS) explores level by level from a start node.
- In unweighted graphs, BFS gives shortest path distance in number of edges.

When to Use:
- Graph is unweighted.
- Need minimum edge-count path.
Time Complexity:
- O(V + E)

Space Complexity:
- O(V)

Avoid When:
- Weighted edges are involved (use Dijkstra/Bellman-Ford).
*/

function bfsDistances(array $graph, string $start): array
{
    $dist = [$start => 0];
    $queue = new SplQueue();
    $queue->enqueue($start);

    while (!$queue->isEmpty()) {
        $node = $queue->dequeue();

        foreach ($graph[$node] ?? [] as $next) {
            if (!array_key_exists($next, $dist)) {
                $dist[$next] = $dist[$node] + 1;
                $queue->enqueue($next);
            }
        }
    }

    return $dist;
}

$graph = [
    'A' => ['B', 'C'],
    'B' => ['D'],
    'C' => ['D', 'E'],
    'D' => [],
    'E' => [],
];

print_r(bfsDistances($graph, 'A'));
