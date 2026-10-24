<?php
$pricePerItem = 500;
$quantity = 3;
$isMember = true;

$subtotal = $pricePerItem * $quantity;
$discount = $isMember ? $subtotal * 0.10 : 0;
$discounted = $subtotal - $discount;
$vat = $discounted * 0.16;
$total = $discounted + $vat;

echo "RECEIPT" . PHP_EOL;
echo "Price per item: $" . $pricePerItem . PHP_EOL;
echo "Quantity: " . $quantity . PHP_EOL;
echo "Member: " . ($isMember ? "Yes" : "No") . PHP_EOL;
echo "Subtotal: $" . $subtotal . PHP_EOL;
echo "Discount (10%): $" . $discount . PHP_EOL;
echo "After discount: $" . $discounted . PHP_EOL;
echo "VAT (16%): $" . $vat . PHP_EOL;
echo "TOTAL: $" . $total . PHP_EOL;
