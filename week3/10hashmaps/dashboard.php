<?php
session_start();

if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$name = $_SESSION['user']['name'] ?? 'friend';
$email = $_SESSION['user']['email'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Hash Map Auth</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($name); ?>!</h1>
    <p>You are logged in as <?php echo htmlspecialchars($email); ?>.</p>
    <p>This page only appears for authenticated users.</p>
    <p><a href="logout.php">Log out</a></p>
</body>
</html>
