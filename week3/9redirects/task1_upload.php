<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload</title>
</head>
<body>
    <h1>Profile Picture Upload</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_pic'])) {
        $file = $_FILES['profile_pic'];
        $uploadDir = 'uploads/';
        
        // Create uploads directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $allowedTypes = ['image/jpeg', 'image/png'];
        $maxSize = 2 * 1024 * 1024; // 2MB
        
        // Check for upload errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "<p style='color: red;'>Upload error occurred.</p>";
        } elseif (!in_array($file['type'], $allowedTypes)) {
            echo "<p style='color: red;'>Only JPG and PNG files are allowed.</p>";
        } elseif ($file['size'] > $maxSize) {
            echo "<p style='color: red;'>File size must be under 2MB.</p>";
        } else {
            // Get file extension
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $file['tmp_name']);
            finfo_close($finfo);
            
            // Double-check MIME type
            if ($mimeType === 'image/jpeg') {
                $extension = 'jpg';
            } elseif ($mimeType === 'image/png') {
                $extension = 'png';
            } else {
                echo "<p style='color: red;'>Invalid file type.</p>";
                exit;
            }
            
            // Rename with random bytes
            $filename = bin2hex(random_bytes(16)) . '.' . $extension;
            $destination = $uploadDir . $filename;
            
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                echo "<p style='color: green;'>Upload successful!</p>";
                echo "<img src='$destination' alt='Profile Picture' style='max-width: 300px;'>";
            } else {
                echo "<p style='color: red;'>Failed to move uploaded file.</p>";
            }
        }
    }
    ?>
    
    <form method="post" action="" enctype="multipart/form-data">
        <label for="profile_pic">Select Profile Picture (JPG/PNG, max 2MB):</label><br><br>
        <input type="file" name="profile_pic" id="profile_pic" accept="image/jpeg,image/png" required><br><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
