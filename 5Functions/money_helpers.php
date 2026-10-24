<?php

// Task 1: Money helpers

/**
 * Format an amount to 2 decimal places and append "KSh"
 */
function formatMoney($amount) {
    return number_format($amount, 2) . ' KSh';
}

/**
 * Apply VAT to an amount. Default rate is 16% (0.16)
 * Returns the total amount including VAT
 */
function applyVat($amount, $rate = 0.16) {
    return $amount * (1 + $rate);
}


function netTotal($items) {
    $sum = 0;
    foreach ($items as $price) {
        $sum += $price;
    }
    return $sum;
}

// Sample data for testing
$amount = 1500;
$prices = [500, 300, 1200];

// Testing all three functions
echo "Formatted amount: " . formatMoney($amount) . "<br>";
echo "Amount after VAT (16%): " . formatMoney(applyVat($amount)) . "<br>";
echo "Net total of items: " . formatMoney(netTotal($prices)) . "<br>";
