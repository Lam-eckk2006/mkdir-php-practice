<?php
// Predictions:
// (5 > 3) && (2 > 8) -> true && false = false
// (5 > 3) || (2 > 8) -> true || false = true
// !(4 === 4) -> !(true) = false
// "10" === 10 -> false (strict equality, different types)

var_dump((5 > 3) && (2 > 8));
var_dump((5 > 3) || (2 > 8));
var_dump(!(4 === 4));
var_dump("10" === 10);

echo "Explanation: '===' checks value and type, so string '10' is not strictly equal to int 10." . PHP_EOL;
