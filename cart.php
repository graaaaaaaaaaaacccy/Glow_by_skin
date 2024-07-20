<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: authentication/login.php");
    exit();
}
$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Checkout</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Checkout</h2>
        <?php if (count($cartItems) > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): ?>
                        <tr>
                            <td><img src="<?php echo $item['image_path']; ?>" alt="<?php echo $item['name']; ?>" width="50"></td>
                            <td><?php echo $item['name']; ?></td>
                            <td>Ksh<?php echo $item['price']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button id="confirm-purchase" class="btn btn-success">Confirm Purchase</button>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#confirm-purchase').on('click', function() {
                $.ajax({
                    url: 'confirm_purchase.php',
                    method: 'POST',
                    success: function(response) {
                        alert('Purchase successful!');
                        window.location.href = 'index.php';
                    },
                    error: function() {
                        alert('Failed to complete the purchase.');
                    }
                });
            });
        });
    </script>
</body>
</html>
