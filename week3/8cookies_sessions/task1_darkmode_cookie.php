<?php
session_start();

// Handle theme change
if (isset($_GET['theme'])) {
    $theme = $_GET['theme'];
    if ($theme === 'dark' || $theme === 'light') {
        setcookie('theme', $theme, time() + (30 * 24 * 60 * 60), '/'); // 30 days
        $_COOKIE['theme'] = $theme;
    }
}

$currentTheme = $_COOKIE['theme'] ?? 'light';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dark Mode Cookie</title>
    <style>
        body.light {
            background-color: #ffffff;
            color: #000000;
        }
        body.dark {
            background-color: #1a1a1a;
            color: #ffffff;
        }
    </style>
</head>
<body class="<?php echo htmlspecialchars($currentTheme); ?>">
    <h1>Dark Mode Demo</h1>
    <p>Current theme: <?php echo htmlspecialchars($currentTheme); ?></p>
    
    <a href="?theme=dark">Switch to Dark Mode</a> | 
    <a href="?theme=light">Switch to Light Mode</a>
    
    <p>Close your browser, reopen this page, and the preference will persist for 30 days!</p>
</body>
</html>
