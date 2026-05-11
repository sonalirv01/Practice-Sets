<?php

declare(strict_types=1);

/*
Difficulty: Advanced
Description:
- Segment Tree supports efficient range queries and point updates.
- This example implements range sum query.

When to Use:
- Frequent range queries + updates.
- Need better than O(n) per query/update.
Time Complexity:
- Build: O(n), Query: O(log n), Update: O(log n)

Space Complexity:
- O(n)

Avoid When:
- Data is static and only prefix sums are needed.
*/

class SegmentTree
{
    private array $tree;
    private int $n;

    public function __construct(array $arr)
    {
        $this->n = count($arr);
        $this->tree = array_fill(0, 4 * max(1, $this->n), 0);
        if ($this->n > 0) {
            $this->build(1, 0, $this->n - 1, $arr);
        }
    }

    private function build(int $node, int $left, int $right, array $arr): void
    {
        if ($left === $right) {
            $this->tree[$node] = $arr[$left];
            return;
        }

        $mid = intdiv($left + $right, 2);
        $this->build($node * 2, $left, $mid, $arr);
        $this->build($node * 2 + 1, $mid + 1, $right, $arr);
        $this->tree[$node] = $this->tree[$node * 2] + $this->tree[$node * 2 + 1];
    }

    public function update(int $idx, int $value): void
    {
        if ($this->n === 0) {
            return;
        }
        $this->updateRec(1, 0, $this->n - 1, $idx, $value);
    }

    private function updateRec(int $node, int $left, int $right, int $idx, int $value): void
    {
        if ($left === $right) {
            $this->tree[$node] = $value;
            return;
        }

        $mid = intdiv($left + $right, 2);
        if ($idx <= $mid) {
            $this->updateRec($node * 2, $left, $mid, $idx, $value);
        } else {
            $this->updateRec($node * 2 + 1, $mid + 1, $right, $idx, $value);
        }

        $this->tree[$node] = $this->tree[$node * 2] + $this->tree[$node * 2 + 1];
    }

    public function query(int $ql, int $qr): int
    {
        if ($this->n === 0) {
            return 0;
        }
        return $this->queryRec(1, 0, $this->n - 1, $ql, $qr);
    }

    private function queryRec(int $node, int $left, int $right, int $ql, int $qr): int
    {
        if ($qr < $left || $right < $ql) {
            return 0;
        }

        if ($ql <= $left && $right <= $qr) {
            return $this->tree[$node];
        }

        $mid = intdiv($left + $right, 2);
        return $this->queryRec($node * 2, $left, $mid, $ql, $qr)
            + $this->queryRec($node * 2 + 1, $mid + 1, $right, $ql, $qr);
    }
}

$arr = [1, 3, 5, 7, 9, 11];
$st = new SegmentTree($arr);

echo 'Query [1,3]: ' . $st->query(1, 3) . PHP_EOL;
$st->update(1, 10);
echo 'After update index 1 to 10, Query [1,3]: ' . $st->query(1, 3) . PHP_EOL;
