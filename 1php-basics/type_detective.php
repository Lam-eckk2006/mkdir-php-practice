<?php
$a = "5";
$b = 5;

var_dump($a); // string
var_dump($b); // integer

echo "Sum: " . ($a + $b) . PHP_EOL; // PHP coerces string "5" to int 5, so 10
echo "Explanation: PHP does type juggling, so numeric string \"5\" is converted to integer 5 before +." . PHP_EOL;

$result = "5 apples" + 2;
echo $result . PHP_EOL;
echo "Explanation: When adding, PHP parses leading number from string \"5 apples\" (5), ignores rest, so 5+2=7." . PHP_EOL;
