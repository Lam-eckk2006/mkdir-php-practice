<?php

echo "=== Repeated version ===<br>";
echo 'Please pay KSh 500<br>';
echo 'Please pay KSh 300<br>';
echo 'Please pay KSh 1200<br>';

echo "<hr>";

// VERSION 2: Using a function (Better approach)
echo "=== Function version ===<br>";

function printInvoice($amount) {
    echo 'Please pay KSh ' . $amount . '<br>';
}

printInvoice(500);
printInvoice(300);
printInvoice(1200);

