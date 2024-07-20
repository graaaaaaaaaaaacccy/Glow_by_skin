<?php
include "includes/config.php";

$baseDir = 'C:/xampp/htdocs/Glow/beauty_images';

// Function to recursively read directories and insert image paths into database
function insertImages($dir, $conn) {
    $files = scandir($dir);

    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $fullPath = $dir . '/' . $file;
            if (is_dir($fullPath)) {
                insertImages($fullPath, $conn); // Recursively read subdirectories
            } else {
                $imagePath = str_replace('C:/xampp/htdocs/Glow/', '', $fullPath);
                $folderName = basename(dirname($fullPath));

                $sql = "INSERT INTO products (image_path, price, name, description) VALUES ('$imagePath', 0.00, '$file', '$folderName')";
                if ($conn->query($sql) === TRUE) {
                   // echo "New record created successfully for $file\n";
                } else {
                   // echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }
}

insertImages($baseDir, $conn);

$conn->close();
?>
