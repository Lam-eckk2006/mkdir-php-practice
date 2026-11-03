<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact List</title>
    <style>
        .flash {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border: 1px solid #c3e6cb;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1>Contact List</h1>
    
    <?php if (isset($_SESSION['flash'])): ?>
        <div class="flash">
            <?php echo htmlspecialchars($_SESSION['flash']); ?>
        </div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
    
    <p>Contacts would be displayed here.</p>
    <a href="flash_create.php">Create New Contact</a>
</body>
</html>
