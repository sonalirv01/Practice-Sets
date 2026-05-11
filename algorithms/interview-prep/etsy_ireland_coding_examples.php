<?php

declare(strict_types=1);

/*
Description:
- Etsy Ireland focused coding examples for marketplace interview prep.

When to Use:
- Practice ecommerce interview scenarios with EU/Ireland flavored constraints.
*/

/*
Problem 1: Cart totals with mixed VAT rates and marketplace fee.
Time Complexity: O(n)
Space Complexity: O(1)
*/
function calculateCartTotals(array $lines, float $discountPercent, float $marketplaceFeePercent): array
{
    $subtotal = 0.0;
    $vatTotal = 0.0;

    foreach ($lines as $line) {
        $qty = max(0, (int) $line['qty']);
        $price = max(0.0, (float) $line['unitPrice']);
        $vatRate = max(0.0, (float) $line['vatRate']);

        $lineBase = $qty * $price;
        $subtotal += $lineBase;
        $vatTotal += $lineBase * ($vatRate / 100);
    }

    $discount = $subtotal * max(0.0, $discountPercent) / 100;
    $discountedSubtotal = max(0.0, $subtotal - $discount);
    $fee = $discountedSubtotal * max(0.0, $marketplaceFeePercent) / 100;
    $grandTotal = $discountedSubtotal + $vatTotal + $fee;

    return [
        'subtotal' => round($subtotal, 2),
        'discount' => round($discount, 2),
        'discountedSubtotal' => round($discountedSubtotal, 2),
        'vatTotal' => round($vatTotal, 2),
        'marketplaceFee' => round($fee, 2),
        'grandTotal' => round($grandTotal, 2),
    ];
}

/*
Problem 2: Coupon eligibility with per-buyer redemption cap.
Time Complexity: O(1)
Space Complexity: O(1)
*/
function checkCouponEligibility(array $coupon, float $cartValue, int $buyerUsage, string $today): array
{
    if ($today < $coupon['startDate'] || $today > $coupon['endDate']) {
        return ['ok' => false, 'reason' => 'COUPON_INACTIVE'];
    }

    if ($cartValue < $coupon['minCart']) {
        return ['ok' => false, 'reason' => 'MIN_CART_NOT_MET'];
    }

    if ($buyerUsage >= $coupon['perBuyerLimit']) {
        return ['ok' => false, 'reason' => 'BUYER_LIMIT_REACHED'];
    }

    return ['ok' => true, 'reason' => 'ELIGIBLE'];
}

/*
Problem 3: Shipping ETA window by route profile.
Time Complexity: O(1)
Space Complexity: O(1)
*/
function shippingEtaWindow(string $originCountry, string $destinationCountry, array $profiles): array
{
    $key = $originCountry . '->' . $destinationCountry;

    if (isset($profiles[$key])) {
        return $profiles[$key];
    }

    if (isset($profiles[$originCountry . '->*'])) {
        return $profiles[$originCountry . '->*'];
    }

    return ['minDays' => 7, 'maxDays' => 21, 'route' => 'DEFAULT'];
}

/*
Problem 4: Listing ranking for search relevance.
Time Complexity: O(n log n)
Space Complexity: O(n)
*/
function rankListings(string $query, array $listings): array
{
    $q = strtolower(trim($query));

    foreach ($listings as &$listing) {
        $title = strtolower($listing['title']);
        $tags = array_map('strtolower', $listing['tags']);

        $score = 0.0;
        if ($title === $q) {
            $score += 100;
        } elseif (str_contains($title, $q)) {
            $score += 60;
        }

        if (in_array($q, $tags, true)) {
            $score += 25;
        }

        $score += min(15.0, (float) $listing['sellerQuality']);
        $score += min(10.0, (float) $listing['recencyBoost']);

        $listing['score'] = round($score, 2);
    }
    unset($listing);

    usort($listings, static function (array $a, array $b): int {
        if ($a['score'] === $b['score']) {
            return strcmp($b['createdAt'], $a['createdAt']);
        }
        return $b['score'] <=> $a['score'];
    });

    return $listings;
}

/*
Problem 5: Idempotent payment callback processing.
Time Complexity: O(1)
Space Complexity: O(1)
*/
function processPaymentEvent(string $eventId, string $orderId, float $amount, array &$processed): string
{
    if (isset($processed[$eventId])) {
        return 'DUPLICATE_IGNORED';
    }

    $processed[$eventId] = [
        'orderId' => $orderId,
        'amount' => $amount,
        'status' => 'PROCESSED',
    ];

    return 'PROCESSED';
}

// ---------------- Demo ----------------
$lines = [
    ['sku' => 'MUG-HANDMADE', 'qty' => 2, 'unitPrice' => 24.99, 'vatRate' => 23.0],
    ['sku' => 'LINEN-BAG', 'qty' => 1, 'unitPrice' => 18.50, 'vatRate' => 13.5],
];
print_r(calculateCartTotals($lines, 10.0, 6.5));

$coupon = [
    'startDate' => '2026-05-01',
    'endDate' => '2026-05-31',
    'minCart' => 40.0,
    'perBuyerLimit' => 2,
];
print_r(checkCouponEligibility($coupon, 52.0, 1, '2026-05-11'));

$profiles = [
    'IE->IE' => ['minDays' => 1, 'maxDays' => 3, 'route' => 'DOMESTIC_IE'],
    'IE->DE' => ['minDays' => 3, 'maxDays' => 7, 'route' => 'EU_STANDARD'],
    'IE->*' => ['minDays' => 5, 'maxDays' => 12, 'route' => 'INTL_FALLBACK'],
];
print_r(shippingEtaWindow('IE', 'DE', $profiles));

$listings = [
    [
        'id' => 'L1',
        'title' => 'Handmade Ceramic Mug',
        'tags' => ['ceramic', 'mug', 'handmade'],
        'sellerQuality' => 13,
        'recencyBoost' => 7,
        'createdAt' => '2026-05-10',
    ],
    [
        'id' => 'L2',
        'title' => 'Ceramic Mug with Clover Pattern',
        'tags' => ['irish', 'gift', 'mug'],
        'sellerQuality' => 12,
        'recencyBoost' => 8,
        'createdAt' => '2026-05-09',
    ],
    [
        'id' => 'L3',
        'title' => 'Linen Tote Bag',
        'tags' => ['linen', 'bag'],
        'sellerQuality' => 15,
        'recencyBoost' => 6,
        'createdAt' => '2026-05-11',
    ],
];
print_r(rankListings('mug', $listings));

$events = [];
echo processPaymentEvent('evt_1', 'ord_9001', 52.73, $events) . PHP_EOL;
echo processPaymentEvent('evt_1', 'ord_9001', 52.73, $events) . PHP_EOL;
