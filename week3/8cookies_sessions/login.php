<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Mini Login with Sessions</title>
</head>
<body>
    <h1>Login</h1>
    <?php
    session_start();
    
    // Hard-coded user (password hashed with password_hash)
    $validEmail = 'admin@shop.test';
    $validPasswordHash = password_hash('secret123', PASSWORD_DEFAULT);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if ($email === $validEmail && password_verify($password, $validPasswordHash)) {
            $_SESSION['user'] = $email;
            $_SESSION['logged_in'] = true;
            header('Location: dashboard.php');
            exit;
        } else {
            echo "<p style='color: red;'>Invalid credentials!</p>";
        }
    }
    ?>
    
    <form method="post" action="">
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
    <p><small>Hint: email = admin@shop.test, password = secret123</small></p>
</body>
</html>
