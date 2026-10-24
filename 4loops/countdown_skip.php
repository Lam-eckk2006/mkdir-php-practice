<?php
$count = 0;
for ($i = 1; $i <= 20; $i++) {
    if ($i % 3 === 0) {
        continue;
    }
    if ($i > 15) {
        break;
    }
    echo $i . PHP_EOL;
    $count++;
}
echo "Count: " . $count . PHP_EOL;

// Change limit to 100 to confirm break still stops early
$count2 = 0;
for ($i = 1; $i <= 100; $i++) {
    if ($i % 3 === 0) {
        continue;
    }
    if ($i > 15) {
        break;
    }
    echo $i . PHP_EOL;
    $count2++;
}
echo "Count2: " . $count2 . PHP_EOL;
