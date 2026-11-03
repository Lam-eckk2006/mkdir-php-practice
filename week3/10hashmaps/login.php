<?php
session_start();

$errors = [];
$email = '';
$justRegistered = isset($_SESSION['registered_email']);
$registeredEmail = $_SESSION['registered_email'] ?? '';
unset($_SESSION['registered_email']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';

    if ($email === '') {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    if ($password === '') {
        $errors['password'] = 'Password is required.';
    }

    if (empty($errors)) {
        $users = $_SESSION['users'] ?? [];

        if (isset($users[$email]) && password_verify($password, $users[$email]['password'])) {
            session_regenerate_id(true);
            $_SESSION['user'] = [
                'name' => $users[$email]['name'],
                'email' => $users[$email]['email'],
            ];
            header('Location: dashboard.php');
            exit;
        }

        $errors['login'] = 'Invalid email or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Hash Map Auth</title>
    <style>
        .error { color: #b00020; font-size: 0.9em; }
        .notice { color: #0b6b2f; }
        form { max-width: 360px; }
        label { display: block; margin-top: 12px; }
        input { width: 100%; padding: 6px; box-sizing: border-box; }
        button { margin-top: 16px; padding: 8px 16px; }
    </style>
</head>
<body>
    <h1>Log in</h1>

    <?php if ($justRegistered): ?>
        <p class="notice">Account created for <?php echo htmlspecialchars($registeredEmail); ?>. You can log in now.</p>
    <?php endif; ?>

    <?php if (isset($errors['login'])): ?>
        <p class="error"><?php echo htmlspecialchars($errors['login']); ?></p>
    <?php endif; ?>

    <form method="post" action="">
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

        <button type="submit">Log in</button>
    </form>

    <p>New here? <a href="register.php">Create an account</a></p>
</body>
</html>
