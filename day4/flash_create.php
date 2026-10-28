<?php
session_start();

// Simulate creating a contact
if (isset($_GET['create'])) {
    // ... process contact creation ...
    $_SESSION['flash'] = 'Contact created successfully!';
    header('Location: flash_list.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Contact</title>
</head>
<body>
    <h1>Create Contact</h1>
    <a href="flash_list.php?create=1">Create a new contact (simulate)</a>
</body>
</html>
