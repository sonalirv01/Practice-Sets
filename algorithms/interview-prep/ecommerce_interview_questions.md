# E-commerce Interview Questions (Coding + Practical Cases)

These are common coding tasks asked by e-commerce companies (marketplace, payment, logistics, retail tech).

## Frequently Asked Coding Questions

1. Implement cart pricing with discounts, tax, and shipping thresholds.
2. Validate coupon rules (date range, max usage, per-user limit, min cart value).
3. Reserve inventory safely for concurrent orders.
4. Find top K best-selling products from order history.
5. Build product search ranking (exact match > prefix > fuzzy).
6. Detect duplicate orders/fraud signals by user behavior.
7. Compute return rate, cancellation rate, and refund exposure.
8. Recommend frequently bought together products.
9. Merge overlapping promotions and resolve conflicts by priority.
10. Design an order state machine (PLACED -> PAID -> SHIPPED -> DELIVERED/RETURNED).
11. Implement idempotent payment callback processing.
12. Resolve promotion conflicts by priority and compatibility rules.
13. Compute per-warehouse fulfillment split for a multi-item cart.
14. Track inventory reservation expiry and release stale holds.
15. Build low-stock alerting logic by SKU velocity.
16. Calculate shipping SLA breach percentage per city.
17. Implement safe retry strategy for order creation APIs.
18. Detect payment-to-order mismatch anomalies.
19. Build top searched but out-of-stock products report.
20. Implement nearest-warehouse assignment for faster delivery.

## Typical SQL Questions

1. Top 10 products by GMV in last 30 days.
2. Daily conversion funnel (visit -> add to cart -> checkout -> paid).
3. Repeat customer rate by month.
4. AOV (Average Order Value) by category.
5. Cancelled orders by payment mode and city.
6. COD failure rate by pincode cluster.
7. SKU fill-rate (ordered vs shipped) by warehouse.
8. Coupon leakage analysis (discount without eligibility).
9. Refund TAT (request to processed) percentile report.
10. Same-day dispatch rate trend by category.

## System/Design-Flavored Coding Prompts

1. Design a coupon service API with validation and abuse prevention.
2. Design inventory reservation with timeout and rollback.
3. Design a scalable product catalog search index update pipeline.
4. Design event-driven order tracking with eventual consistency.
5. Design a fallback payment routing strategy.
6. Design idempotency keys for checkout and payment systems.

## How to answer strongly

- Clarify assumptions first (currency, timezone, precision, edge cases).
- Start with brute force, then optimize.
- Always mention Big-O and trade-offs.
- Add at least 2 edge-case tests in discussion.
- Keep function names domain-specific (cartTotal, reserveInventory, etc.).

## Runnable Code

- See [ecommerce_company_examples.php](ecommerce_company_examples.php) for practical implementations of:
  - cart total
  - inventory reservation
  - top K products
  - coupon validation
  - return rates
- See [ecommerce_company_advanced_examples.php](ecommerce_company_advanced_examples.php) for:
  - idempotent payment processing
  - promotion conflict resolution
  - state transition validation
  - nearest warehouse assignment
- See [etsy_ireland_coding_examples.php](etsy_ireland_coding_examples.php) for Etsy Ireland focused coding exercises.

## Etsy Ireland Targeted Mock Set

- See [etsy_ireland_mock_interview.md](etsy_ireland_mock_interview.md) for 20 targeted prompts with expected answer points and sample test cases.
- See [etsy_ireland_2week_plan.md](etsy_ireland_2week_plan.md) for a focused daily preparation roadmap.
