<?php

declare(strict_types=1);

/*
Description:
- Common coding exercises seen in e-commerce company interviews.
- Includes practical tasks around cart totals, inventory, ranking, and order analysis.

When to Use:
- Interview prep for marketplace, retail, payments, logistics, and checkout teams.

Time/Space notes are listed above each function.
*/

/*
Problem 1: Cart total with discount and tax.
Time Complexity: O(n)
Space Complexity: O(1)
*/
function cartTotal(array $items, float $discountPercent, float $taxPercent): float
{
    $subtotal = 0.0;

    foreach ($items as $item) {
        $subtotal += $item['price'] * $item['qty'];
    }

    $discounted = $subtotal * (1 - $discountPercent / 100);
    $total = $discounted * (1 + $taxPercent / 100);

    return round($total, 2);
}

/*
Problem 2: Inventory reservation.
Time Complexity: O(m) where m is number of requested SKUs
Space Complexity: O(1)
*/
function reserveInventory(array &$stock, array $request): bool
{
    foreach ($request as $sku => $qty) {
        if (!isset($stock[$sku]) || $stock[$sku] < $qty) {
            return false;
        }
    }

    foreach ($request as $sku => $qty) {
        $stock[$sku] -= $qty;
    }

    return true;
}

/*
Problem 3: Top K best-selling products.
Time Complexity: O(n log n)
Space Complexity: O(u) where u is unique products
*/
function topKProducts(array $orders, int $k): array
{
    $sales = [];

    foreach ($orders as $order) {
        foreach ($order['items'] as $item) {
            $sku = $item['sku'];
            $qty = $item['qty'];
            $sales[$sku] = ($sales[$sku] ?? 0) + $qty;
        }
    }

    arsort($sales);
    return array_slice($sales, 0, $k, true);
}

/*
Problem 4: Coupon validity check by date and minimum cart value.
Time Complexity: O(1)
Space Complexity: O(1)
*/
function isCouponValid(array $coupon, float $cartValue, string $today): bool
{
    if ($cartValue < $coupon['minCart']) {
        return false;
    }

    if ($today < $coupon['startDate'] || $today > $coupon['endDate']) {
        return false;
    }

    return true;
}

/*
Problem 5: Return rate per product.
Time Complexity: O(n)
Space Complexity: O(u)
*/
function returnRateByProduct(array $shipments, array $returns): array
{
    $shipped = [];
    $returned = [];

    foreach ($shipments as $row) {
        $sku = $row['sku'];
        $shipped[$sku] = ($shipped[$sku] ?? 0) + $row['qty'];
    }

    foreach ($returns as $row) {
        $sku = $row['sku'];
        $returned[$sku] = ($returned[$sku] ?? 0) + $row['qty'];
    }

    $rates = [];
    foreach ($shipped as $sku => $qtyShipped) {
        $qtyReturned = $returned[$sku] ?? 0;
        $rates[$sku] = $qtyShipped > 0 ? round(($qtyReturned / $qtyShipped) * 100, 2) : 0.0;
    }

    return $rates;
}

// ---------------- Demo ----------------
$items = [
    ['sku' => 'TSHIRT', 'price' => 499.0, 'qty' => 2],
    ['sku' => 'JEANS', 'price' => 1499.0, 'qty' => 1],
];

echo 'Cart total (10% discount, 18% tax): ' . cartTotal($items, 10, 18) . PHP_EOL;

$stock = ['TSHIRT' => 10, 'JEANS' => 5, 'SHOES' => 2];
$request = ['TSHIRT' => 2, 'SHOES' => 1];
$ok = reserveInventory($stock, $request);
echo 'Inventory reserved? ' . ($ok ? 'Yes' : 'No') . PHP_EOL;
print_r($stock);

$orders = [
    ['items' => [['sku' => 'TSHIRT', 'qty' => 3], ['sku' => 'JEANS', 'qty' => 1]]],
    ['items' => [['sku' => 'TSHIRT', 'qty' => 2], ['sku' => 'SHOES', 'qty' => 4]]],
    ['items' => [['sku' => 'JEANS', 'qty' => 2], ['sku' => 'SHOES', 'qty' => 1]]],
];
print_r(topKProducts($orders, 2));

$coupon = ['minCart' => 1000.0, 'startDate' => '2026-05-01', 'endDate' => '2026-05-31'];
echo 'Coupon valid? ' . (isCouponValid($coupon, 1599.0, '2026-05-11') ? 'Yes' : 'No') . PHP_EOL;

$shipments = [
    ['sku' => 'TSHIRT', 'qty' => 100],
    ['sku' => 'JEANS', 'qty' => 40],
];
$returns = [
    ['sku' => 'TSHIRT', 'qty' => 8],
    ['sku' => 'JEANS', 'qty' => 2],
];
print_r(returnRateByProduct($shipments, $returns));
