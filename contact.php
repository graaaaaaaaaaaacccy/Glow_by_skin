<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="fav.png" type="image/x-icon">
    <title>Contact: Glow By Skin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 50px;
        }

        .contact-card-container {
            display: flex;
            align-items: center;
            padding: 20px;
            margin-bottom: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .contact-card-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .contact-icon {
            font-size: 2em;
            color: #007bff;
            margin-right: 20px;
        }

        .contact-details h2 {
            margin: 0;
            font-size: 1.5em;
        }

        .contact-info {
            font-size: 1em;
            color: #333;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<header>
    <?php require_once 'desktopnav.php'; ?>
</header>

<main>
    <div class="container">
        <h1 class="text-center mb-5">Contact Us</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="contact-card-container mail">
                    <div class="contact-icon">
                        <ion-icon name="mail-outline"></ion-icon>
                    </div>
                    <div class="contact-details">
                        <h2>Email</h2>
                        <p class="contact-info">info@glowbyskin.com</p>
                    </div>
                </div>
                <div class="contact-card-container whatsapp">
                    <div class="contact-icon">
                        <ion-icon name="logo-whatsapp"></ion-icon>
                    </div>
                    <div class="contact-details">
                        <h2>WhatsApp</h2>
                        <p class="contact-info">+123 456 7890</p>
                    </div>
                </div>
                <div class="contact-card-container phone">
                    <div class="contact-icon">
                        <ion-icon name="call-outline"></ion-icon>
                    </div>
                    <div class="contact-details">
                        <h2>Phone</h2>
                        <p class="contact-info">+2547 0000 0000</p>
                    </div>
                </div>
                <div class="contact-card-container address">
                    <div class="contact-icon">
                        <ion-icon name="location-outline"></ion-icon>
                    </div>
                    <div class="contact-details">
                        <h2>Address</h2>
                        <p class="contact-info">123 Glow St, Nairobi County</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-container">
                    <h2>Send Us a Message</h2>
                    <form id="contact-form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.2/ionicons.js"></script>
<script>
    document.getElementById('contact-form').addEventListener('submit', function(event) {
        event.preventDefault();
        alert('Message sent!');
        document.getElementById('contact-form').reset();
    });
</script>
</body>
</html>
