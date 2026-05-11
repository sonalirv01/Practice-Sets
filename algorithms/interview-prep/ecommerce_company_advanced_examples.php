<?php

declare(strict_types=1);

/*
Description:
- Advanced ecommerce interview coding examples.

When to Use:
- Practice real-world backend interview scenarios for cart, checkout, payments, and fulfillment systems.
*/

/*
Problem 1: Idempotent payment callback handling.
Time Complexity: O(1)
Space Complexity: O(1)
*/
function processPaymentCallback(string $paymentId, float $amount, array &$processedPayments): string
{
    if (isset($processedPayments[$paymentId])) {
        return 'DUPLICATE_IGNORED';
    }

    $processedPayments[$paymentId] = [
        'amount' => $amount,
        'status' => 'SUCCESS',
        'processedAt' => date('Y-m-d H:i:s'),
    ];

    return 'PROCESSED';
}

/*
Problem 2: Promotion conflict resolution by priority.
Time Complexity: O(n log n)
Space Complexity: O(n)
*/
function pickApplicablePromotions(array $promotions, float $cartTotal): array
{
    $eligible = array_values(array_filter(
        $promotions,
        static fn(array $p): bool => $cartTotal >= $p['minCart']
    ));

    usort($eligible, static function (array $a, array $b): int {
        if ($a['priority'] === $b['priority']) {
            return $b['discount'] <=> $a['discount'];
        }
        return $a['priority'] <=> $b['priority'];
    });

    $selected = [];
    $usedGroup = [];

    foreach ($eligible as $promo) {
        $group = $promo['group'];
        if (!isset($usedGroup[$group])) {
            $selected[] = $promo;
            $usedGroup[$group] = true;
        }
    }

    return $selected;
}

/*
Problem 3: Order state transition validation.
Time Complexity: O(1)
Space Complexity: O(1)
*/
function canTransition(string $current, string $next): bool
{
    $allowed = [
        'PLACED' => ['PAID', 'CANCELLED'],
        'PAID' => ['PACKED', 'CANCELLED'],
        'PACKED' => ['SHIPPED'],
        'SHIPPED' => ['DELIVERED', 'RETURN_REQUESTED'],
        'DELIVERED' => ['RETURN_REQUESTED'],
        'RETURN_REQUESTED' => ['RETURNED', 'RETURN_REJECTED'],
        'RETURNED' => [],
        'RETURN_REJECTED' => [],
        'CANCELLED' => [],
    ];

    return in_array($next, $allowed[$current] ?? [], true);
}

/*
Problem 4: Nearest warehouse assignment.
Time Complexity: O(w) where w is number of warehouses
Space Complexity: O(1)
*/
function nearestWarehouse(array $warehouses, int $customerPincode): array
{
    $best = [];
    $bestDistance = PHP_INT_MAX;

    foreach ($warehouses as $wh) {
        $distance = abs($wh['pincode'] - $customerPincode);
        if ($distance < $bestDistance) {
            $bestDistance = $distance;
            $best = $wh;
        }
    }

    return $best;
}

// ---------------- Demo ----------------
$processed = [];
echo 'Payment 1: ' . processPaymentCallback('pay_1001', 1599.00, $processed) . PHP_EOL;
echo 'Payment 1 retry: ' . processPaymentCallback('pay_1001', 1599.00, $processed) . PHP_EOL;

$promos = [
    ['code' => 'SAVE10', 'minCart' => 1000, 'discount' => 10, 'priority' => 2, 'group' => 'PERCENT'],
    ['code' => 'SAVE20', 'minCart' => 2000, 'discount' => 20, 'priority' => 1, 'group' => 'PERCENT'],
    ['code' => 'FLAT100', 'minCart' => 1200, 'discount' => 100, 'priority' => 1, 'group' => 'FLAT'],
];
print_r(pickApplicablePromotions($promos, 2200));

echo 'Can PAID -> SHIPPED? ' . (canTransition('PAID', 'SHIPPED') ? 'Yes' : 'No') . PHP_EOL;
echo 'Can PAID -> PACKED? ' . (canTransition('PAID', 'PACKED') ? 'Yes' : 'No') . PHP_EOL;

$warehouses = [
    ['id' => 'WH-DEL', 'city' => 'Delhi', 'pincode' => 110001],
    ['id' => 'WH-JPR', 'city' => 'Jaipur', 'pincode' => 302001],
    ['id' => 'WH-LKO', 'city' => 'Lucknow', 'pincode' => 226001],
];
print_r(nearestWarehouse($warehouses, 201301));
