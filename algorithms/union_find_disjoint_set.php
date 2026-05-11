<?php

declare(strict_types=1);

/*
Difficulty: Intermediate
Description:
- Union-Find (Disjoint Set Union) tracks connected components efficiently.
- Supports union(x, y) and find(x) with near O(1) amortized operations.

When to Use:
- Dynamic connectivity checks.
- Cycle detection in undirected graphs.
- Kruskal's Minimum Spanning Tree.
Time Complexity:
- Near O(1) amortized per operation

Space Complexity:
- O(n)

Avoid When:
- Need to frequently remove edges (basic DSU does not support this well).
*/

class UnionFind
{
    private array $parent = [];
    private array $rank = [];

    public function __construct(int $n)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->parent[$i] = $i;
            $this->rank[$i] = 0;
        }
    }

    public function find(int $x): int
    {
        if ($this->parent[$x] !== $x) {
            $this->parent[$x] = $this->find($this->parent[$x]);
        }

        return $this->parent[$x];
    }

    public function union(int $a, int $b): void
    {
        $rootA = $this->find($a);
        $rootB = $this->find($b);

        if ($rootA === $rootB) {
            return;
        }

        if ($this->rank[$rootA] < $this->rank[$rootB]) {
            $this->parent[$rootA] = $rootB;
        } elseif ($this->rank[$rootA] > $this->rank[$rootB]) {
            $this->parent[$rootB] = $rootA;
        } else {
            $this->parent[$rootB] = $rootA;
            $this->rank[$rootA]++;
        }
    }

    public function connected(int $a, int $b): bool
    {
        return $this->find($a) === $this->find($b);
    }
}

$uf = new UnionFind(6);
$uf->union(0, 1);
$uf->union(1, 2);
$uf->union(3, 4);

echo '0 and 2 connected? ' . ($uf->connected(0, 2) ? 'Yes' : 'No') . PHP_EOL;
echo '2 and 4 connected? ' . ($uf->connected(2, 4) ? 'Yes' : 'No') . PHP_EOL;
