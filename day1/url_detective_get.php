<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Detective - GET</title>
</head>
<body>
    <h1>URL Detective</h1>
    <form method="get" action="">
        <label for="city">City:</label>
        <input type="text" name="city" id="city" required><br><br>
        
        <label for="min">Min:</label>
        <input type="text" name="min" id="min" required><br><br>
        
        <button type="submit">Submit (GET)</button>
    </form>
    
    <?php if (isset($_GET['city']) || isset($_GET['min'])): ?>
        <h2>Received via GET:</h2>
        <p>City: <?php echo htmlspecialchars($_GET['city'] ?? ''); ?></p>
        <p>Min: <?php echo htmlspecialchars($_GET['min'] ?? ''); ?></p>
        <p><strong>Look at the URL - data appears as query string!</strong></p>
    <?php endif; ?>
    
    <hr>
    <h2>Why GET should never carry a password:</h2>
    <p>GET data appears in the URL, browser history, server logs, and can be shared/bookmarked - making passwords visible to anyone who can see them. Use POST for sensitive data.</p>
</body>
</html>
