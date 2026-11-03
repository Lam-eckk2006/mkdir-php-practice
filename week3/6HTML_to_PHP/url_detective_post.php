<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Detective - POST</title>
</head>
<body>
    <h1>URL Detective - POST</h1>
    <form method="post" action="">
        <label for="city">City:</label>
        <input type="text" name="city" id="city" required><br><br>
        
        <label for="min">Min:</label>
        <input type="text" name="min" id="min" required><br><br>
        
        <button type="submit">Submit (POST)</button>
    </form>
    
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <h2>Received via POST:</h2>
        <p>City: <?php echo htmlspecialchars($_POST['city'] ?? ''); ?></p>
        <p>Min: <?php echo htmlspecialchars($_POST['min'] ?? ''); ?></p>
        <p><strong>Data is sent in the request body, not in the URL!</strong></p>
    <?php endif; ?>
</body>
</html>
