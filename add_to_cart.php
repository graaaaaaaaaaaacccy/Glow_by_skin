<?php
session_start();

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['product_id'])) {
    $productId = $data['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] += 1;
    } else {
        // Fetch product details from the database
        include "includes/config.php";
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $stmt->close();
        $conn->close();

        if ($product) {
            $_SESSION['cart'][$productId] = [
                'id' => $product['product_id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'image_path' => $product['image_path'],
                'quantity' => 1
            ];
        } else {
            echo json_encode(['success' => false, 'message' => 'Product not found']);
            exit;
        }
    }

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid product ID']);
}
?>
