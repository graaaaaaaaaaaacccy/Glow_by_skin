<?php
// Include your database configuration file
require_once '../includes/config.php';

// Function to recursively scan a directory for images and save their paths
function save_images_to_db($directory) {
    global $conn;
    
    // Scan the directory for image files
    $imageFiles = glob("$directory/*.{jpg,jpeg,png,gif}", GLOB_BRACE);

    // Prepare SQL statement for inserting image paths
    $stmt = $conn->prepare("INSERT INTO images (image_path) VALUES (?)");

    // Bind parameters and execute for each image file
    foreach ($imageFiles as $imageFile) {
        $imagePath = str_replace('\\', '/', $imageFile); // Convert backslashes to forward slashes
        $stmt->bind_param("s", $imagePath);
        if ($stmt->execute()) {
            echo "Image path inserted successfully: $imagePath<br>";
        } else {
            echo "Error inserting image path: $imagePath<br>";
        }
    }

    // Close statement
    $stmt->close();

    // Recursively scan subdirectories
    $subdirectories = glob("$directory/*", GLOB_ONLYDIR);
    foreach ($subdirectories as $subdir) {
        save_images_to_db($subdir);
    }
}

// Directory where images are stored
$imageDir = 'C:/xampp/htdocs/Glow_by_skin/beauty_images';

// Call the function to save images to the database
save_images_to_db($imageDir);

// Close database connection
$conn->close();
?>
