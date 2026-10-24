<?php
$mark = 49;

if ($mark >= 80) {
    $grade = "A";
    $passed = true;
} elseif ($mark >= 70 && $mark <= 79) {
    $grade = "B";
    $passed = true;
} elseif ($mark >= 60 && $mark <= 69) {
    $grade = "C";
    $passed = true;
} elseif ($mark >= 50 && $mark <= 59) {
    $grade = "D";
    $passed = true;
} else {
    $grade = "F";
    $passed = false;
}

echo "Mark: $mark, Grade: $grade, Passed: " . ($passed ? "Yes" : "No") . PHP_EOL;

// Test cases
foreach ([45, 50, 95] as $m) {
    if ($m >= 80) { $g = "A"; $p = true; }
    elseif ($m >= 70) { $g = "B"; $p = true; }
    elseif ($m >= 60) { $g = "C"; $p = true; }
    elseif ($m >= 50) { $g = "D"; $p = true; }
    else { $g = "F"; $p = false; }
    echo "Mark: $m, Grade: $g, Passed: " . ($p ? "Yes" : "No") . PHP_EOL;
}
