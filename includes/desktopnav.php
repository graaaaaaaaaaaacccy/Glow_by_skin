

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
.desktop-navigation-menu .container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px; /* Adjust padding as needed */
}

.desktop-menu-category-list {
  display: flex;
  align-items: center;
  list-style: none;
  padding: 0;
  margin: 0;
  width: 100%;
}

.menu-logo {
  display: flex;
  align-items: center;
}

.menu-logo a {
  display: flex;
  align-items: center;
  text-decoration: none;
}

.menu-logo h1 {
  margin-right: 10px; /* Adjust spacing between title and image */
}

.menu-logo img {
  width: 100px; /* Adjust image size */
}

.menu-items {
  display: flex;
  justify-content: center;
  flex-grow: 1;
}

.menu-category {
  margin: 0 20px; /* Adjust spacing between menu items */
}

.menu-title {
  color: hsl(0, 0%, 13%);
  text-decoration: none;
  font-size: 1.2em; /* Adjust font size as needed */
}

.menu-title:hover {
  color: hsl(0, 0%, 50%); /* Adjust hover color as needed */
}


  </style>
</head>
<body>
  <!-- desktop navigation -->
<!-- desktop navigation -->
<nav class="desktop-navigation-menu">
  <div class="container">
    <ul class="desktop-menu-category-list">
      <li class="menu-logo">
        <a href="./index.php?id=<?php echo (isset( $_SESSION['customer_name']))? $_SESSION['id']: 'unknown';?>" class="header-logo">
          <h1 style="text-align: left;">Glow By Skin</h1>
          <img src="admin/upload/<?php echo $_SESSION['web-img']; ?>" alt="logo" width="200px">
        </a>
      </li>
      <div class="menu-items">
        <li class="menu-category">
          <a href="index.php?id=<?php echo (isset( $_SESSION['customer_name']))? $_SESSION['id']: 'unknown';?>" class="menu-title">
            Home
          </a>
        </li>

        <li class="menu-category">
          <a href="contact.php?id=<?php echo (isset( $_SESSION['customer_name']))? $_SESSION['id']: 'unknown';?>" class="menu-title">
            Contact
          </a>
        </li>

        <li class="menu-category">
          <a href="about.php?id=<?php echo (isset( $_SESSION['customer_name']))? $_SESSION['id']: 'unknown';?>" class="menu-title">About</a>
        </li>
      </div>
    </ul>
  </div>
</nav>


</body>
</html>