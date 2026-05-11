# Etsy Ireland Mock Interview Set

This set is tailored for Etsy-style marketplace engineering in Ireland and the EU context.

Focus areas:
- Marketplace workflows for sellers and buyers
- VAT and cross-border checkout considerations
- Search and discovery for handmade and vintage listings
- Trust, safety, and payment reliability
- Shipping, fulfillment, and delivery promises

## 1) Cart Pricing with VAT and Marketplace Fee

Question:
Implement pricing for a cart where each line has quantity, item price, and VAT rate. Include optional seller discount and Etsy-style marketplace fee.

Expected answer points:
- Monetary precision handling and rounding strategy
- Correct order of operations (subtotal, discount, fee, VAT)
- Handling mixed VAT rates per line
- Edge cases like zero quantity and negative price guards

Sample test cases:
- Single item, 23% VAT, no discount
- Multiple lines with 23% and 13.5% VAT
- Discount pushes subtotal close to zero

## 2) EU VAT Number Validation Flow

Question:
Design a service that validates seller VAT number and decides whether to charge VAT on fees.

Expected answer points:
- Separation of sync format checks and async authority checks
- Caching validation results with expiry
- Fallback behavior when external validation is down
- Audit trail and idempotent retries

Sample test cases:
- Valid IE VAT number
- Invalid format input
- Timeout from external service

## 3) Shipping ETA by Seller Location and Profile

Question:
Given seller county in Ireland and destination country, compute estimated delivery window.

Expected answer points:
- Shipping profile fallback logic
- Weekend/holiday adjustments
- Handling unavailable routes
- SLA confidence ranges

Sample test cases:
- Cork to Dublin
- Galway to Germany
- Missing profile route

## 4) Inventory Reservation for Handmade Variants

Question:
Implement reservation for listing variants (size, color) with timeout release.

Expected answer points:
- Atomic stock decrement per variant
- Reservation expiry semantics
- Retry-safe reservation idempotency key
- Partial reservation rollback behavior

Sample test cases:
- Concurrent requests for same variant
- Reservation expiration and release
- Mixed in-stock and out-of-stock variants

## 5) Listing Search Ranking

Question:
Rank listings by exact match, tag match, recency, and seller quality score.

Expected answer points:
- Weighted scoring strategy and explainability
- Tie-breakers for deterministic ordering
- Normalization of score ranges
- Offline evaluation metrics (CTR, conversion)

Sample test cases:
- Exact title match vs high-quality partial match
- Same score tie broken by recency
- No text match fallback behavior

## 6) Duplicate Listing Detection

Question:
Detect likely duplicate listings across sellers using title similarity and image hash.

Expected answer points:
- Precision vs recall trade-off
- Threshold tuning and false-positive review queue
- Feature design (n-grams, perceptual hash)
- Human-in-loop escalation

Sample test cases:
- Minor title changes with same image hash
- Different products with similar keywords
- Multi-image conflict patterns

## 7) Coupon Eligibility Engine

Question:
Implement coupon checks for start/end date, min cart value, max redemptions, and per-buyer limit.

Expected answer points:
- Timezone-safe date handling (Ireland locale)
- Concurrent redemption race prevention
- Rule precedence and clear rejection reasons
- Idempotent apply call

Sample test cases:
- Expired coupon
- Buyer exceeded per-user cap
- Exact min cart boundary value

## 8) Order State Machine with Returns

Question:
Model order transitions including refund and return states.

Expected answer points:
- Explicit allowed transitions map
- Event sourcing vs mutable row discussion
- Compensating actions on failed transitions
- Terminal states and idempotent events

Sample test cases:
- Paid to packed allowed
- Delivered to cancelled rejected
- Return requested to refunded allowed

## 9) Seller Payout Calculation

Question:
Compute seller payout after fees, VAT on fees, and refunds.

Expected answer points:
- Netting logic per order lifecycle
- Hold periods and payout schedule windows
- Handling partial refunds and disputes
- Ledger-style immutable records

Sample test cases:
- Order with full refund
- Partial refund after payout cut-off
- Negative payout carry-forward

## 10) Fraud Rules for New Buyer Accounts

Question:
Design rules for suspicious activity in checkout.

Expected answer points:
- Velocity checks (cards, IP, address)
- Rule scoring and threshold actions
- Risk queue with explainable reasons
- Feedback loop from chargebacks

Sample test cases:
- Multiple cards in short window
- Mismatched geo and BIN country
- Legit user false positive handling

## 11) Review Abuse Detection

Question:
Flag suspicious review patterns while preserving genuine feedback.

Expected answer points:
- Burst detection and graph signals
- NLP/toxicity guardrails with moderation queue
- Appeal process and transparency
- Bias and fairness considerations

Sample test cases:
- Many 1-star reviews from new accounts
- Verified buyer positive review cluster
- Repeated text templates

## 12) Marketplace Category Taxonomy Service

Question:
Design category assignment for handmade products with manual override.

Expected answer points:
- ML suggest plus rule fallback
- Versioned taxonomy migration strategy
- Monitoring drift and misclassification
- Explainability for seller edits

Sample test cases:
- Ambiguous product title
- Taxonomy node deprecation
- Override conflict with auto-classifier

## 13) Bulk Listing Import Pipeline

Question:
Build CSV ingestion for seller catalog upload with validation report.

Expected answer points:
- Async job processing and chunking
- Per-row error reporting and retry policy
- Schema evolution handling
- Idempotent re-upload behavior

Sample test cases:
- Invalid image URL in row 50
- Duplicate SKU in file
- Partial success with downloadable error report

## 14) Favorite and Recommendation Feed

Question:
Generate personalized listing feed using favorites and session signals.

Expected answer points:
- Cold-start strategy
- Real-time vs batch feature updates
- Diversity and novelty controls
- Feedback loop for clicked and purchased items

Sample test cases:
- New user with no history
- User with narrow taste overfitting issue
- Seasonal query spikes

## 15) Returns and Refund SLA Tracker

Question:
Track SLA breaches for returns/refunds and trigger alerts.

Expected answer points:
- Event timestamps and business-day calculations
- SLA by category and country route
- Alert fatigue controls and aggregation
- Root-cause tagging for operations

Sample test cases:
- Weekend crossing case
- Missing event timestamp fallback
- Multiple SLAs per order line

## 16) Messaging Reliability Between Buyer and Seller

Question:
Design reliable messaging with delivery/read receipts and moderation filtering.

Expected answer points:
- At-least-once delivery with dedupe IDs
- Ordering guarantees within conversation
- Content filtering and abuse escalation
- Privacy and retention policy

Sample test cases:
- Duplicate message retries
- Out-of-order delivery correction
- Blocked seller conversation rules

## 17) Search Index Update Consistency

Question:
Keep listing index fresh when price, stock, and title update frequently.

Expected answer points:
- Event-driven indexing pipeline
- Reindex backfill and dead-letter queue
- Versioning to avoid stale overwrites
- Freshness SLI and alert thresholds

Sample test cases:
- Rapid consecutive updates
- Missing event replay from queue
- Price update reflected within target latency

## 18) Multi-Currency Display and Settlement

Question:
Support EUR display for buyers while handling settlement currency for sellers.

Expected answer points:
- Rate source and timestamping
- Rounding policy and display vs settlement separation
- Rate lock duration in checkout
- Reconciliation strategy

Sample test cases:
- EUR display with GBP seller settlement
- FX rate update during checkout
- Rounding tie edge case

## 19) A/B Test for Search Relevance

Question:
Design an experiment comparing ranking models for listing search.

Expected answer points:
- Guardrail metrics and success criteria
- Randomization unit and sample ratio checks
- Segmentation by market and category
- Rollout strategy and rollback triggers

Sample test cases:
- Traffic imbalance between buckets
- Metric regression with improved CTR
- Country-specific result differences

## 20) Incident Scenario: Checkout Timeout Spike

Question:
You see increased checkout timeouts in Ireland traffic. How do you investigate and mitigate?

Expected answer points:
- Triage dashboard and scope confirmation
- Dependency map and recent changes review
- Fast mitigations (circuit breaker, degrade non-critical calls)
- Post-incident action items and prevention

Sample test cases:
- Payment provider latency spike
- One region edge node issue
- Feature flag rollback validation

## How to Practice with This Set

- Solve 2 coding prompts and 1 design prompt daily.
- For each answer, include complexity, edge cases, and failure handling.
- Keep explanations concise: problem, approach, trade-offs, risks.
