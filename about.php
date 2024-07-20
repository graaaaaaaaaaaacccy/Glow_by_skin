<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: authentication/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="icon" href="images/fav.png" type="image/x-icon">
  <title>About Us: Glow By Skin</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }

    .overlay {
      display: none;
    }

    .about-us {
      background-color: #fff;
      padding: 50px 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin: 20px auto;
      border-radius: 10px;
      max-width: 800px;
    }

    .about-us h1, .about-us h2 {
      color: #333; /* Dark grey */
      margin-bottom: 20px;
    }

    .about-us p {
      font-size: 18px;
      line-height: 1.6;
      color: #555;
      margin-bottom: 20px;
    }

    .about-us p strong {
      color: #333; /* Dark grey */
    }

    .about-us-content {
      text-align: center;
    }

    .about-us-content span {
      font-size: 16px;
      font-weight: bold;
      color: #333; /* Dark grey */
    }
  </style>
  <title>About Us - Glow By Skin Shop</title>
</head>

<body>
  <div class="overlay" data-overlay></div>
  <!-- HEADER -->
  <header>
    <?php require_once 'includes/desktopnav.php' ?>
  </header>

  <!-- MAIN -->
  <main>
    <div class="product-container">
      <div class="container">
        <div class="product-box">
          <!-- About Us Section -->
          <div class="product-main">
            <div class="about-us">
              <div class="about-us-section">
                <!-- About Us Text -->
                <div class="about-us-content">
                  <div class="about-us-text">
                    <h1 id="about-title">About Us!</h1>
                    <h2>Welcome To Glow By Skin Shop</h2>
                    <p>Welcome to Glow by Skin, your ultimate online system for achieving radiant and healthy skin. We understand that skincare is not one-size-fits-all, which is why we've crafted a personalized platform designed to cater to your unique skincare needs.</p>
                    <p>Thanks For Visiting Us <strong id="about-title"></strong></p>
                    <p><span>Have a nice day!</span></p>
                  </div>
                </div>
              </div>
            </div>
            <!-- /About Us Section -->
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
