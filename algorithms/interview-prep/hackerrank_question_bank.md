# HackerRank-Style Question Bank

Use this list to practice the most commonly asked coding patterns. These are modeled after frequent HackerRank topics and challenge styles.

## Arrays and Strings

1. Two Sum Variant (Pair with target sum)
- Difficulty: Easy
- Pattern: Hash map
- Asked to test: Fast lookups, handling duplicates

2. Longest Substring Without Repeating Characters
- Difficulty: Medium
- Pattern: Sliding window
- Asked to test: Window shrink/expand logic

3. Left Rotation of Array by K
- Difficulty: Easy
- Pattern: Index mapping
- Asked to test: Modulo arithmetic

4. Minimum Bribes (Queue manipulation)
- Difficulty: Medium
- Pattern: Greedy + local inversion counting
- Asked to test: Constraints reasoning

## Sorting and Searching

5. Merge Intervals
- Difficulty: Medium
- Pattern: Sort + scan
- Asked to test: Boundary handling

6. Binary Search on Answer
- Difficulty: Medium
- Pattern: Monotonic predicate + binary search
- Asked to test: Efficient optimization

7. Count Inversions
- Difficulty: Hard
- Pattern: Merge sort variation
- Asked to test: Divide and conquer mastery

## Hashing and Frequency

8. Ransom Note / Can Construct String
- Difficulty: Easy
- Pattern: Frequency map
- Asked to test: Counting correctness

9. Anagram Grouping
- Difficulty: Medium
- Pattern: Hash normalization
- Asked to test: Canonical keys

10. Top K Frequent Elements
- Difficulty: Medium
- Pattern: Heap or bucket
- Asked to test: Trade-offs by constraints

## Stack and Queue

11. Balanced Brackets
- Difficulty: Easy
- Pattern: Stack
- Asked to test: Nested validation

12. Largest Rectangle in Histogram
- Difficulty: Hard
- Pattern: Monotonic stack
- Asked to test: Index boundary logic

13. Sliding Window Maximum
- Difficulty: Hard
- Pattern: Deque
- Asked to test: Efficient O(n) window max

## Linked List

14. Detect Cycle
- Difficulty: Easy
- Pattern: Fast/slow pointers
- Asked to test: Pointer movement logic

15. Reverse Linked List
- Difficulty: Easy
- Pattern: Iterative pointer reversal
- Asked to test: In-place update safety

## Trees and BST

16. Lowest Common Ancestor in BST
- Difficulty: Easy
- Pattern: BST properties
- Asked to test: Ordered traversal logic

17. Level Order Traversal
- Difficulty: Medium
- Pattern: BFS
- Asked to test: Queue-based tree processing

18. Validate BST
- Difficulty: Medium
- Pattern: Range constraints recursion
- Asked to test: Correct global constraints

## Graph

19. Number of Islands
- Difficulty: Medium
- Pattern: DFS/BFS flood-fill
- Asked to test: Visited tracking

20. Shortest Path in Unweighted Graph
- Difficulty: Medium
- Pattern: BFS
- Asked to test: Graph modeling

21. Course Schedule (Cycle in Directed Graph)
- Difficulty: Medium
- Pattern: Topological sort / DFS cycle detection
- Asked to test: Dependency reasoning

## Dynamic Programming

22. Coin Change (Minimum Coins)
- Difficulty: Medium
- Pattern: 1D DP
- Asked to test: State transition design

23. House Robber
- Difficulty: Medium
- Pattern: 1D DP
- Asked to test: Include/exclude recurrence

24. Longest Increasing Subsequence
- Difficulty: Medium/Hard
- Pattern: DP or binary-search optimization
- Asked to test: Sequence optimization

25. 0/1 Knapsack
- Difficulty: Medium
- Pattern: 1D/2D DP
- Asked to test: Capacity transition correctness

## Bit Manipulation and Math

26. Single Number
- Difficulty: Easy
- Pattern: XOR
- Asked to test: Bitwise intuition

27. Count Set Bits in Range
- Difficulty: Medium
- Pattern: Bit DP / observations
- Asked to test: Pattern recognition

## SQL + Data (often seen in HackerRank tracks)

28. Top 3 Salaries per Department
- Difficulty: Medium
- Pattern: Window functions

29. Monthly Active Users
- Difficulty: Medium
- Pattern: Grouping + date logic

30. Duplicate Records Cleanup
- Difficulty: Easy/Medium
- Pattern: CTE + ranking

## Additional Frequently Asked Patterns

31. Dynamic Array Queries
- Difficulty: Medium
- Pattern: Indexed sequence simulation
- Asked to test: Correct use of modulo and mutable state

32. Sparse Arrays (String frequency)
- Difficulty: Easy
- Pattern: Hash map frequency
- Asked to test: Query-time optimization

33. Caesar Cipher
- Difficulty: Easy
- Pattern: Character arithmetic
- Asked to test: ASCII transformations and wrap-around

34. Time Conversion (12h to 24h)
- Difficulty: Easy
- Pattern: String parsing
- Asked to test: Edge handling at 12 AM/PM

35. Grid Challenge
- Difficulty: Medium
- Pattern: Sort rows + column validation
- Asked to test: Matrix traversal logic

36. New Year Chaos Variant
- Difficulty: Medium
- Pattern: Bounded inversion counting
- Asked to test: Constraint pruning

37. Sherlock and Anagrams Variant
- Difficulty: Medium
- Pattern: Substring signature counting
- Asked to test: Combinatorics with hashing

38. Frequency Queries
- Difficulty: Medium/Hard
- Pattern: Dual hash maps (value count + count frequency)
- Asked to test: O(1) query updates

39. Largest Subarray with Equal 0s and 1s
- Difficulty: Medium
- Pattern: Prefix sum + hash map
- Asked to test: Prefix-state reuse

40. Minimum Swaps to Sort
- Difficulty: Medium
- Pattern: Cycle decomposition
- Asked to test: Permutation cycles

41. Poisonous Plants Style Stack Problem
- Difficulty: Hard
- Pattern: Monotonic stack with day tracking
- Asked to test: Non-trivial stack state

42. Maximum Subarray Sum Modulo M
- Difficulty: Hard
- Pattern: Prefix sums + balanced search
- Asked to test: Ordered set reasoning

43. Candies Distribution
- Difficulty: Hard
- Pattern: Greedy two-pass
- Asked to test: Local constraints satisfaction

44. Castle on the Grid
- Difficulty: Medium
- Pattern: BFS with directional expansion
- Asked to test: State graph modeling

45. Connected Cell in a Grid
- Difficulty: Medium
- Pattern: DFS/BFS flood fill with 8 directions
- Asked to test: Component size tracking

46. Mark and Toys (Budget shopping)
- Difficulty: Easy
- Pattern: Sort + greedy
- Asked to test: Budget boundary conditions

47. Pairs with Given Difference
- Difficulty: Medium
- Pattern: Two pointers or hash set
- Asked to test: Efficient pair counting

48. Common Child (LCS variant)
- Difficulty: Hard
- Pattern: 2D Dynamic Programming
- Asked to test: DP table formulation

49. Abbreviation (DP over strings)
- Difficulty: Hard
- Pattern: DP with character transitions
- Asked to test: State definition precision

50. Matrix Layer Rotation
- Difficulty: Hard
- Pattern: Index mapping over rings
- Asked to test: Geometry and boundaries

## How to Practice Efficiently

- Do 2 easy + 2 medium daily.
- Re-solve missed questions after 48 hours.
- For each problem, write:
  - brute-force idea
  - optimized approach
  - time and space complexity
- Practice explaining aloud in 2 minutes (important for interviews).

## Runnable Practice Examples

- See [hackerrank_coding_examples.php](hackerrank_coding_examples.php) for solved HackerRank-style coding examples in PHP.
