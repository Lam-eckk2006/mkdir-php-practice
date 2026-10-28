<?php
session_start();

// Initialize cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle add to cart
if (isset($_GET['add'])) {
    $id = $_GET['add'];
    $_SESSION['cart'][] = $id;
    header('Location: cart.php');
    exit;
}

// Handle clear cart
if (isset($_GET['clear'])) {
    $_SESSION['cart'] = [];
    header('Location: cart.php');
    exit;
}

$products = [
    ['id' => 1, 'name' => 'Laptop', 'price' => '$999'],
    ['id' => 2, 'name' => 'Phone', 'price' => '$699'],
    ['id' => 3, 'name' => 'Headphones', 'price' => '$199'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Products</h1>
    <p><strong>Items in cart: <?php echo count($_SESSION['cart']); ?></strong> | <a href="cart.php?clear=1">Clear cart</a></p>
    
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?php echo htmlspecialchars($product['name']); ?> - <?php echo htmlspecialchars($product['price']); ?>
                <a href="cart.php?add=<?php echo $product['id']; ?>">Add to cart</a>
            </li>
        <?php endforeach; ?>
    </ul>
    
    <h2>Cart Contents:</h2>
    <?php if (empty($_SESSION['cart'])): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($_SESSION['cart'] as $itemId): ?>
                <li>Product ID: <?php echo htmlspecialchars($itemId); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
