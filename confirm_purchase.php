<?php
session_start();

// Here you can handle the purchase logic, e.g., save the order to the database

// Clear the cart
unset($_SESSION['cart']);

echo json_encode(['success' => true]);
?>
