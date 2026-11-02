<?php
session_start();

if (!isset($_SESSION['users']) || !is_array($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

$errors = [];
$fullName = $email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['full_name'] ?? '');
    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($fullName === '') {
        $errors['full_name'] = 'Full name is required.';
    } elseif (strlen($fullName) < 2) {
        $errors['full_name'] = 'Full name must be at least 2 characters.';
    }

    if ($email === '') {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    } elseif (isset($_SESSION['users'][$email])) {
        $errors['email'] = 'An account with this email already exists.';
    }

    if ($password === '') {
        $errors['password'] = 'Password is required.';
    } elseif (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters.';
    }

    if ($confirmPassword === '') {
        $errors['confirm_password'] = 'Please confirm your password.';
    } elseif ($password !== $confirmPassword) {
        $errors['confirm_password'] = 'Passwords do not match.';
    }

    if (empty($errors)) {
        $_SESSION['users'][$email] = [
            'name' => $fullName,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        $_SESSION['registered_email'] = $email;
        header('Location: login.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Hash Map Auth</title>
    <style>
        .error { color: #b00020; font-size: 0.9em; }
        form { max-width: 360px; }
        label { display: block; margin-top: 12px; }
        input { width: 100%; padding: 6px; box-sizing: border-box; }
        button { margin-top: 16px; padding: 8px 16px; }
    </style>
</head>
<body>
    <h1>Create an account</h1>

    <form method="post" action="">
        <label for="full_name">Full name</label>
        <input type="text" name="full_name" id="full_name" value="<?php echo htmlspecialchars($fullName); ?>">
        <?php if (isset($errors['full_name'])): ?>
            <span class="error"><?php echo htmlspecialchars($errors['full_name']); ?></span>
        <?php endif; ?>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
        <?php if (isset($errors['email'])): ?>
            <span class="error"><?php echo htmlspecialchars($errors['email']); ?></span>
        <?php endif; ?>

        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <?php if (isset($errors['password'])): ?>
            <span class="error"><?php echo htmlspecialchars($errors['password']); ?></span>
        <?php endif; ?>

        <label for="confirm_password">Confirm password</label>
        <input type="password" name="confirm_password" id="confirm_password">
        <?php if (isset($errors['confirm_password'])): ?>
            <span class="error"><?php echo htmlspecialchars($errors['confirm_password']); ?></span>
        <?php endif; ?>

        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Log in</a></p>
</body>
</html>
