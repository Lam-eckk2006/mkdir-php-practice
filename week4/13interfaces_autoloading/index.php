<?php
require __DIR__ . '/vendor/autoload.php';

use App\Calculator;
use App\Greeter;

$greeter = new Greeter();
$calculator = new Calculator();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PSR-4 Autoloading</title>
</head>
<body>
    <h1>PSR-4 autoloading</h1>

    <p><?php echo htmlspecialchars($greeter->greet('Lam')); ?></p>
    <p>12 + 8 = <?php echo htmlspecialchars((string) $calculator->add(12, 8)); ?></p>
    <p>6 &times; 7 = <?php echo htmlspecialchars((string) $calculator->multiply(6, 7)); ?></p>

    <p>There are no manual <code>require</code> statements for these classes - only <code>vendor/autoload.php</code>.</p>
</body>
</html>
