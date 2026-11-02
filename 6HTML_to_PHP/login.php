<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    echo "Email submitted: " . htmlspecialchars($email) . "<br>";
    echo "<em>Note: Password not echoed and not visible in URL.</em>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>
