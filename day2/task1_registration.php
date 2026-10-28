<?php
$errors = [];
$fullName = $email = $password = $confirmPassword = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    
    // Validate name
    if ($fullName === '') {
        $errors['full_name'] = 'Full name is required.';
    }
    
    // Validate email
    if ($email === '') {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }
    
    // Validate password
    if ($password === '') {
        $errors['password'] = 'Password is required.';
    } elseif (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters.';
    }
    
    // Validate confirm password
    if ($confirmPassword === '') {
        $errors['confirm_password'] = 'Please confirm your password.';
    } elseif ($password !== $confirmPassword) {
        $errors['confirm_password'] = 'Passwords do not match.';
    }
    
    // If no errors, success
    if (empty($errors)) {
        echo "Welcome, " . htmlspecialchars($fullName);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <style>
        .error { color: red; font-size: 0.9em; }
    </style>
</head>
<body>
    <h1>Registration</h1>
    <form method="post" action="">
        <label for="full_name">Full Name:</label><br>
        <input type="text" name="full_name" id="full_name" value="<?php echo htmlspecialchars($fullName); ?>"><br>
        <?php if (isset($errors['full_name'])): ?>
            <span class="error"><?php echo htmlspecialchars($errors['full_name']); ?></span><br>
        <?php endif; ?>
        <br>
        
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>"><br>
        <?php if (isset($errors['email'])): ?>
            <span class="error"><?php echo htmlspecialchars($errors['email']); ?></span><br>
        <?php endif; ?>
        <br>
        
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password"><br>
        <?php if (isset($errors['password'])): ?>
            <span class="error"><?php echo htmlspecialchars($errors['password']); ?></span><br>
        <?php endif; ?>
        <br>
        
        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" name="confirm_password" id="confirm_password"><br>
        <?php if (isset($errors['confirm_password'])): ?>
            <span class="error"><?php echo htmlspecialchars($errors['confirm_password']); ?></span><br>
        <?php endif; ?>
        <br>
        
        <button type="submit">Register</button>
    </form>
</body>
</html>
