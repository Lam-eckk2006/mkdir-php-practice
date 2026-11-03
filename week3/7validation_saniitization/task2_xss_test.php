<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XSS Test</title>
</head>
<body>
    <h1>XSS Test</h1>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <button type="submit">Submit</button>
    </form>
    
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <h2>Output without htmlspecialchars():</h2>
        <p><?php echo $_POST['name'] ?? ''; ?></p>
        
        <h2>Output with htmlspecialchars():</h2>
        <p><?php echo htmlspecialchars($_POST['name'] ?? ''); ?></p>
        
        <p><strong>Note:</strong> htmlspecialchars() prevents XSS by converting special characters to HTML entities, so scripts are displayed as text instead of being executed.</p>
    <?php endif; ?>
</body>
</html>
