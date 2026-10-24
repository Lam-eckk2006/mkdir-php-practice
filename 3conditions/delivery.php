<?php
// Rule: members always get free delivery; non-members pay 200 unless total > 5000, then delivery is free.
$total = 3000;
$isMember = true;

$delivery = $isMember ? 0 : ($total > 5000 ? 0 : 200);

echo "Order total: $" . $total . ", Member: " . ($isMember ? "Yes" : "No") . ", Delivery charge: $" . $delivery . PHP_EOL;

// Test cases
foreach ([3000=>false, 6000=>false, 3000=>true] as $t => $m) {
    $d = $m ? 0 : ($t > 5000 ? 0 : 200);
    echo "Total: $t, Member: " . ($m ? "Y" : "N") . " -> Delivery: $d" . PHP_EOL;
}
