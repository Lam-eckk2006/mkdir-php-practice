<?php
$dayNumber = 6; // test with different values like 1, 5, 6, 7, 9

switch ($dayNumber) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo "Weekday";
        break;
    case 6:
    case 7:
        echo "Weekend";
        break;
    default:
        echo "Invalid day number";
}
echo PHP_EOL;

// Test others
foreach ([1, 5, 6, 7, 9] as $d) {
    switch ($d) {
        case 1: case 2: case 3: case 4: case 5: echo "$d: Weekday"; break;
        case 6: case 7: echo "$d: Weekend"; break;
        default: echo "$d: Invalid day number"; break;
    }
    echo PHP_EOL;
}
