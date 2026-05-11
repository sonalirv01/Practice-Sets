# Algorithm Selection Cheat Sheet

Use this guide to quickly choose the right algorithm by problem type.

## Sorting

| Problem | Recommended Algorithm | Why |
|---|---|---|
| Small or nearly sorted array | Insertion Sort | Very simple, fast on nearly sorted input |
| Need stable sort with predictable performance | Merge Sort | Stable and always O(n log n) |
| Fast average-case in-memory sorting | Quick Sort | Great practical performance |
| Very small educational demo | Bubble Sort | Easy to understand |

## Searching and Sequence Patterns

| Problem | Recommended Algorithm | Why |
|---|---|---|
| Search in sorted array | Binary Search | O(log n) lookup |
| Longest/shortest valid contiguous window | Sliding Window | Usually reduces O(n^2) to O(n) |
| Fast substring search in large text | KMP | O(n + m) pattern matching |

## Dynamic Programming

| Problem | Recommended Algorithm | Why |
|---|---|---|
| Minimum number of coins to form amount | Coin Change DP | Handles overlapping subproblems |
| Choose items under capacity (take/skip) | 0/1 Knapsack DP | Optimal value under constraints |
| Longest increasing subsequence length | LIS DP | Classic sequence optimization |

## Graph Algorithms

| Problem | Recommended Algorithm | Why |
|---|---|---|
| Shortest path in unweighted graph | BFS | Level-order guarantees shortest edge count |
| Shortest path with non-negative weights | Dijkstra | Efficient and standard |
| Shortest path with possible negative weights | Bellman-Ford | Supports negative edges and cycle detection |
| All-pairs shortest paths (small graph) | Floyd-Warshall | Computes every pair distance |
| Dependency ordering in DAG | Topological Sort (Kahn) | Produces valid prerequisite order |

## Greedy and Backtracking

| Problem | Recommended Algorithm | Why |
|---|---|---|
| Max non-overlapping intervals | Activity Selection (Greedy) | Earliest finish-time strategy is optimal |
| Generate all subsets/combinations | Backtracking | Explores all valid choices systematically |

## Data Structure-Based Choices

| Problem | Recommended Algorithm | Why |
|---|---|---|
| Dynamic connectivity / component checks | Union-Find (DSU) | Near O(1) amortized union/find |
| Prefix queries / autocomplete | Trie | Prefix operations in O(L) |
| Frequent range sum queries + updates | Segment Tree | Query/update in O(log n) |

## Quick Rules

- If data is sorted, think Binary Search.
- If graph is unweighted, use BFS.
- If graph has non-negative weights, use Dijkstra.
- If graph can have negative edges, use Bellman-Ford.
- If problem says contiguous subarray/substring, try Sliding Window.
- If problem asks "best" and has repeated subproblems, try DP.
- If you need all possible combinations, use Backtracking.
- If you need many prefix queries, use Trie.
- If you need many range query/update operations, use Segment Tree.
