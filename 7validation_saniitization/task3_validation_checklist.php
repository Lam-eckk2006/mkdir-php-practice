<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validation Checklist - Booking Form</title>
    <style>
        .error { color: red; font-size: 0.9em; }
    </style>
</head>
<body>
    <h1>Hotel Booking Form</h1>
    
    <?php
    $errors = [];
    $name = $email = $phone = $checkin = $guests = '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $checkin = $_POST['checkin'] ?? '';
        $guests = $_POST['guests'] ?? '';
        
        // Name validation
        if ($name === '') {
            $errors['name'] = 'Full name is required.';
        } elseif (strlen($name) < 2) {
            $errors['name'] = 'Name must be at least 2 characters.';
        } elseif (strlen($name) > 50) {
            $errors['name'] = 'Name cannot exceed 50 characters.';
        }
        
        // Email validation
        if ($email === '') {
            $errors['email'] = 'Email address is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address (e.g., name@example.com).';
        }
        
        // Phone validation
        if ($phone === '') {
            $errors['phone'] = 'Phone number is required.';
        } elseif (!preg_match('/^[0-9+\-\s()]{10,15}$/', $phone)) {
            $errors['phone'] = 'Please enter a valid phone number (10-15 digits).';
        }
        
        // Check-in date validation
        if ($checkin === '') {
            $errors['checkin'] = 'Check-in date is required.';
        } else {
            $checkinDate = strtotime($checkin);
            $today = strtotime(date('Y-m-d'));
            if ($checkinDate < $today) {
                $errors['checkin'] = 'Check-in date cannot be in the past.';
            }
        }
        
        // Guests validation
        if ($guests === '') {
            $errors['guests'] = 'Number of guests is required.';
        } elseif (!is_numeric($guests)) {
            $errors['guests'] = 'Number of guests must be a number.';
        } elseif ((int)$guests < 1) {
            $errors['guests'] = 'At least 1 guest is required.';
        } elseif ((int)$guests > 10) {
            $errors['guests'] = 'Maximum 10 guests allowed per booking.';
        }
        
        if (empty($errors)) {
            echo "<p style='color: green;'>Booking request submitted successfully!</p>";
        }
    }
    ?>
    
    <form method="post" action="">
        <label for="name">Full Name:</label><br>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>"><br>
        <?php if (isset($errors['name'])): ?><span class="error"><?php echo $errors['name']; ?></span><br><?php endif; ?>
        <br>
        
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>"><br>
        <?php if (isset($errors['email'])): ?><span class="error"><?php echo $errors['email']; ?></span><br><?php endif; ?>
        <br>
        
        <label for="phone">Phone Number:</label><br>
        <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>"><br>
        <?php if (isset($errors['phone'])): ?><span class="error"><?php echo $errors['phone']; ?></span><br><?php endif; ?>
        <br>
        
        <label for="checkin">Check-in Date:</label><br>
        <input type="date" name="checkin" id="checkin" value="<?php echo htmlspecialchars($checkin); ?>"><br>
        <?php if (isset($errors['checkin'])): ?><span class="error"><?php echo $errors['checkin']; ?></span><br><?php endif; ?>
        <br>
        
        <label for="guests">Number of Guests:</label><br>
        <input type="number" name="guests" id="guests" value="<?php echo htmlspecialchars($guests); ?>"><br>
        <?php if (isset($errors['guests'])): ?><span class="error"><?php echo $errors['guests']; ?></span><br><?php endif; ?>
        <br>
        
        <button type="submit">Book Now</button>
    </form>
    
    <hr>
    <h2>Validation Checklist (for reference):</h2>
    <ul>
        <li><strong>Name:</strong> Required, min 2 chars, max 50 chars</li>
        <li><strong>Email:</strong> Required, valid email format</li>
        <li><strong>Phone:</strong> Required, valid format (10-15 digits)</li>
        <li><strong>Check-in Date:</strong> Required, cannot be in the past</li>
        <li><strong>Guests:</strong> Required, numeric, between 1-10</li>
    </ul>
</body>
</html>
