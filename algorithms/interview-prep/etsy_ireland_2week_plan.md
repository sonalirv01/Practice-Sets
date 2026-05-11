# Etsy Ireland 2-Week Interview Preparation Plan

This plan is tailored for Etsy-style marketplace engineering interviews in Ireland.

Daily format:
- Coding: 2 problems
- Design: 1 focused prompt
- Review: 30-45 minutes (complexity + edge cases + communication)

## Week 1: Core Coding + Marketplace Basics

### Day 1: Arrays, Hashing, and Marketplace Metrics
- Coding:
  - Two Sum Variant
  - Top K Frequent Elements
- Use:
  - [hackerrank_question_bank.md](hackerrank_question_bank.md)
  - [hackerrank_coding_examples.php](hackerrank_coding_examples.php)
- Design prompt:
  - Define GMV, AOV, conversion metrics for Etsy Ireland marketplace dashboards.
- Review:
  - Explain O(n) hash map solutions in 2 minutes.

### Day 2: Sliding Window and String Search
- Coding:
  - Longest Substring Without Repeating Characters
  - KMP style substring search
- Use:
  - [../sliding_window_longest_unique_substring.php](../sliding_window_longest_unique_substring.php)
  - [../kmp_string_search.php](../kmp_string_search.php)
- Design prompt:
  - Search query ranking signals for handmade products.
- Review:
  - Compare naive vs optimized runtime.

### Day 3: Sorting and Binary Search
- Coding:
  - Merge Intervals
  - Binary Search on Answer
- Use:
  - [../merge_sort.php](../merge_sort.php)
  - [../binary_search.php](../binary_search.php)
- Design prompt:
  - Product listing sort strategy (relevance vs recency vs seller quality).
- Review:
  - Practice boundary and off-by-one test cases.

### Day 4: Stacks and Queues
- Coding:
  - Balanced Brackets
  - Sliding Window Maximum
- Use:
  - [hackerrank_coding_examples.php](hackerrank_coding_examples.php)
  - [hackerrank_question_bank.md](hackerrank_question_bank.md)
- Design prompt:
  - Message queue reliability for buyer-seller chat.
- Review:
  - Practice explaining monotonic data structures.

### Day 5: Trees and Graphs
- Coding:
  - BFS shortest path
  - Topological sort (course schedule type)
- Use:
  - [../bfs_shortest_path.php](../bfs_shortest_path.php)
  - [../topological_sort_kahn.php](../topological_sort_kahn.php)
- Design prompt:
  - Dependency flow for listing publish pipeline.
- Review:
  - Draw graph states and traversal order.

### Day 6: Dynamic Programming Basics
- Coding:
  - Coin Change
  - 0/1 Knapsack
- Use:
  - [../coin_change_dp.php](../coin_change_dp.php)
  - [../knapsack_01_dp.php](../knapsack_01_dp.php)
- Design prompt:
  - Cart discount optimization rules and conflicts.
- Review:
  - State definition and transition clarity.

### Day 7: Week 1 Mock Round
- Coding:
  - 1 medium + 1 hard from HackerRank bank
- Use:
  - [hackerrank_question_bank.md](hackerrank_question_bank.md)
- Design prompt:
  - Order state machine and refund flow.
- Review:
  - 60-minute timed session + 20-minute retrospective.

## Week 2: Etsy Ireland Domain Focus

### Day 8: VAT and Pricing Logic
- Coding:
  - Cart total with mixed VAT rates
  - Coupon eligibility with per-buyer cap
- Use:
  - [etsy_ireland_coding_examples.php](etsy_ireland_coding_examples.php)
- Design prompt:
  - VAT service boundaries and failure fallback.
- Review:
  - Rounding and precision decisions.

### Day 9: Inventory and Reservation
- Coding:
  - Reserve inventory with timeout release
  - Nearest warehouse assignment
- Use:
  - [ecommerce_company_examples.php](ecommerce_company_examples.php)
  - [ecommerce_company_advanced_examples.php](ecommerce_company_advanced_examples.php)
- Design prompt:
  - Reservation consistency under concurrency.
- Review:
  - Race conditions and idempotency keys.

### Day 10: Search and Ranking
- Coding:
  - Listing ranking with weighted scores
  - Duplicate listing detection approach (pseudo-code)
- Use:
  - [etsy_ireland_coding_examples.php](etsy_ireland_coding_examples.php)
  - [etsy_ireland_mock_interview.md](etsy_ireland_mock_interview.md)
- Design prompt:
  - A/B testing plan for ranking changes.
- Review:
  - Trade-off discussion: relevance vs diversity.

### Day 11: Payments and Reliability
- Coding:
  - Idempotent payment callback processing
  - Retry-safe order creation flow (pseudo-code)
- Use:
  - [ecommerce_company_advanced_examples.php](ecommerce_company_advanced_examples.php)
- Design prompt:
  - Payment outage mitigation and fallback routing.
- Review:
  - Failure-mode checklist and observability signals.

### Day 12: Analytics and SQL Focus
- Coding:
  - Top K best-selling products
  - Return rate computation
- Use:
  - [ecommerce_company_examples.php](ecommerce_company_examples.php)
  - [ecommerce_interview_questions.md](ecommerce_interview_questions.md)
- Design prompt:
  - Daily KPI pipeline (GMV, conversion, return rate).
- Review:
  - Metric definitions and edge cases.

### Day 13: Full Etsy Ireland Mock
- Coding:
  - 2 medium/hard domain questions from mock set
- Use:
  - [etsy_ireland_mock_interview.md](etsy_ireland_mock_interview.md)
- Design prompt:
  - Shipping ETA and SLA breach tracking service.
- Review:
  - 90-minute mock interview simulation.

### Day 14: Final Revision and Interview Scripts
- Coding:
  - Re-solve your 3 weakest problems without notes
- Use:
  - [hackerrank_question_bank.md](hackerrank_question_bank.md)
  - [etsy_ireland_mock_interview.md](etsy_ireland_mock_interview.md)
- Design prompt:
  - Incident response: checkout timeout spike in IE traffic.
- Review:
  - Final revision pack:
    - 10 complexity summaries
    - 10 edge cases
    - 5 system design diagrams

## Final Checklist Before Interview

- Can explain each solution with complexity in under 2 minutes.
- Can identify at least 3 edge cases per problem.
- Can describe idempotency, consistency, and retry strategy clearly.
- Can discuss Etsy Ireland specifics (VAT, EU shipping, seller-buyer marketplace trust).
