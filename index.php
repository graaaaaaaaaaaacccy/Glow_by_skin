<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: authentication/login.php");
    exit();
}
include_once('database/image-query.php');
include "includes/config.php";

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="images/fav.png" type="image/x-icon">
    <title>Glow By Skin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .product-showcase {
            padding: 20px;
        }

        .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            height: 200px;
            object-fit: cover;
        }

        .card-title, .card-text {
            text-align: center;
        }

        .add-to-cart {
            background-color: #d3d3d3; /* Light grey */
            color: #343a40; /* Dark text color */
            display: block;
            margin: 10px auto 0;
            text-align: center;
            width: 80%;
        }

        .add-to-cart:hover {
            background-color: #6c757d; /* Medium grey */
            color: white;
        }

        .cart-icon {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
        }
    </style>
</head>

<body>
<header>
    <?php require_once 'includes/desktopnav.php' ?>
</header>

<main>
    <div class="product-showcase container">
        <h2 class="text-center mb-5">New Arrivals</h2>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-3 mb-4">
                    <div class="card product-card">
                        <img src="<?php echo $product['image_path']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                        <div class="card-body">
                            <p class="card-text"><?php echo $product['name']; ?></p>
                            <p class="card-text">Ksh<?php echo $product['price']; ?></p>
                            <button class="btn add-to-cart" data-id="<?php echo $product['product_id']; ?>">Add to Cart</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButtons = document.querySelectorAll('.add-to-cart');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const productId = this.getAttribute('data-id');
                    const originalText = this.textContent;
                    this.textContent = 'Added';

                    fetch('add_to_cart.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ product_id: productId })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const cartCount = document.getElementById('cart-count');
                            cartCount.textContent = parseInt(cartCount.textContent) + 1;
                        } else {
                            alert('Failed to add to cart');
                        }
                        setTimeout(() => {
                            this.textContent = originalText;
                        }, 1000);
                    });
                });
            });
        });
    </script>
</main>
</body>
</html>
