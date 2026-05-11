# Algorithms Practice Set (PHP)

Each algorithm file includes:
- Difficulty
- Description
- When to use
- Time and space complexity
- A runnable example

Quick reference:
- `algorithm_selection_cheatsheet.md`: Problem type -> recommended algorithm.

## Sorting
- `bubble_sort.php` (Beginner): Basic adjacent-swap sorting. Good for learning.
- `insertion_sort.php` (Beginner): Great for small or nearly sorted arrays.
- `merge_sort.php` (Intermediate): Stable `O(n log n)` sort.
- `quick_sort.php` (Intermediate): Fast average-case general sorting.

## Searching and String/Array Patterns
- `binary_search.php` (Beginner): Search in sorted arrays.
- `sliding_window_longest_unique_substring.php` (Intermediate): Contiguous window optimization pattern.
- `kmp_string_search.php` (Advanced): Linear-time substring matching.

## Graph
- `bfs_shortest_path.php` (Intermediate): Shortest path in unweighted graphs.
- `dijkstra.php` (Intermediate): Shortest path in weighted graphs (non-negative edges).
- `bellman_ford.php` (Advanced): Shortest path with negative edges and cycle detection.
- `floyd_warshall.php` (Advanced): All-pairs shortest path.
- `topological_sort_kahn.php` (Intermediate): Dependency ordering in DAGs.

## Dynamic Programming
- `coin_change_dp.php` (Intermediate): Minimum coins for target amount.
- `knapsack_01_dp.php` (Intermediate): Max value under capacity constraint.
- `lis_dp.php` (Advanced): Longest Increasing Subsequence.

## Greedy
- `activity_selection_greedy.php` (Intermediate): Maximum non-overlapping interval selection.

## Backtracking
- `backtracking_subsets.php` (Intermediate): Generate all subsets.

## Data Structure Based
- `union_find_disjoint_set.php` (Intermediate): Connectivity and component management.
- `trie_prefix_search.php` (Intermediate): Prefix-based dictionary search.
- `segment_tree_range_sum.php` (Advanced): Range sum query with point updates.

## Interview Prep
- `interview-prep/hackerrank_question_bank.md`: 50 HackerRank-style questions by pattern.
- `interview-prep/hackerrank_coding_examples.php`: Runnable HackerRank-style PHP examples.
- `interview-prep/ecommerce_interview_questions.md`: Common ecommerce interview questions (coding/SQL/design).
- `interview-prep/ecommerce_company_examples.php`: Practical ecommerce coding examples.
- `interview-prep/ecommerce_company_advanced_examples.php`: Advanced ecommerce coding examples.
- `interview-prep/etsy_ireland_mock_interview.md`: Etsy Ireland mock interview set with expected points and test cases.
- `interview-prep/etsy_ireland_coding_examples.php`: Etsy Ireland focused runnable coding examples.
- `interview-prep/etsy_ireland_2week_plan.md`: Day-by-day Etsy Ireland interview preparation plan.

## Run one file

```bash
php algorithms/<file-name>.php
```

Example:

```bash
php algorithms/merge_sort.php
```

## Run all files

```bash
php algorithms/run_all.php
```
