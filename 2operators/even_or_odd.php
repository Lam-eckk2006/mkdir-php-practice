<?php
// If remainder when divided by 2 is 0, number is even; else odd.
$numbers = [7, 0, -4];
foreach ($numbers as $number) {
    $remainder = $number % 2;
    if ($remainder == 0) {
        echo $number . " is even" . PHP_EOL;
    } else {
        echo $number . " is odd" . PHP_EOL;
    }
}
