<?php
$products = [
    ['id' => 1, 'name' => 'Laptop'],
    ['id' => 2, 'name' => 'Phone'],
    ['id' => 3, 'name' => 'Headphones'],
    ['id' => 4, 'name' => 'Keyboard'],
    ['id' => 5, 'name' => 'Mouse'],
];

$results = $products;
if (isset($_GET['q']) && $_GET['q'] !== '') {
    $query = $_GET['q'];
    $results = [];
    foreach ($products as $product) {
        if (stripos($product['name'], $query) !== false) {
            $results[] = $product;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Search</title>
</head>
<body>
    <h1>Product Search</h1>
    <form method="get" action="">
        <input type="text" name="q" placeholder="Search products..." value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>">
        <button type="submit">Search</button>
    </form>
    
    <h2>Results:</h2>
    <ul>
        <?php foreach ($results as $product): ?>
            <li><?php echo htmlspecialchars($product['name']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
