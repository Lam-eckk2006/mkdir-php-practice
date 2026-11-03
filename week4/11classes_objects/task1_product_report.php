<?php
class Product
{
    public function __construct(
        public string $name,
        public float $price,
        public int $stock
    ) {
    }

    public function totalValue(): float
    {
        return $this->price * $this->stock;
    }

    public function isLowStock(): bool
    {
        return $this->stock < 10;
    }
}

$products = [
    new Product('Sugar', 120.00, 45),
    new Product('Milk', 65.50, 8),
    new Product('Bread', 55.00, 12),
];

$grandTotal = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Report</title>
    <style>
        table { border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #ccc; padding: 6px 14px; text-align: left; }
        th { background: #f3f3f3; }
        .low { color: #b00020; font-weight: bold; }
        .ok { color: #0b6b2f; }
    </style>
</head>
<body>
    <h1>Product Report</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Total value</th>
            <th>Status</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <?php $grandTotal += $product->totalValue(); ?>
            <tr>
                <td><?php echo htmlspecialchars($product->name); ?></td>
                <td>KSh <?php echo number_format($product->price, 2); ?></td>
                <td><?php echo (int) $product->stock; ?></td>
                <td>KSh <?php echo number_format($product->totalValue(), 2); ?></td>
                <td>
                    <?php if ($product->isLowStock()): ?>
                        <span class="low">LOW STOCK</span>
                    <?php else: ?>
                        <span class="ok">OK</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan="3">Grand total</th>
            <th colspan="2">KSh <?php echo number_format($grandTotal, 2); ?></th>
        </tr>
    </table>
</body>
</html>
