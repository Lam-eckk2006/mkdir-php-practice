<?php
$stock = ['Sugar' => 45, 'Milk' => 120, 'Bread' => 65, 'Eggs' => 21];
$totalUnits = 0;

foreach ($stock as $product => $units) {
    $totalUnits += $units;
    if ($units < 20) {
        echo $product . ": " . $units . " (LOW)" . PHP_EOL;
    } else {
        echo $product . ": " . $units . PHP_EOL;
    }
}

echo "Total units: " . $totalUnits . PHP_EOL;
