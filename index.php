<?php
include_once('./includes/headerNav.php');
include_once('./functions/functions.php');

include "includes/config.php";

// Get all banner products
$banner_products = get_banner_details();

// Get all category bar products
$category_bar_products = get_category_bar_products();

// Get categories
$categories = get_categories();
$clothes = get_clothes_category();
$footwears = get_footwear_category();
$jewelries = get_jewelry_category();
$perfumes = get_perfume_category();
$cosmetics = get_cosmetics_category();
$glasses = get_glasses_category();
$bags = get_bags_category();

$images = get_images_from_db();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  

  <style>
      .product-showcase {
          width: 100%;
          padding: 20px;
          background-color: #f9f9f9;
          border-radius: 10px;
      }

      .product-showcase h2.title {
          font-size: 2em;
          margin-bottom: 20px;
          color: #333;
          text-align: center;
      }

      .showcase-wrapper {
          overflow-x: auto;
          padding-bottom: 10px;
      }

      .showcase-container {
          display: flex;
          flex-wrap: wrap;
          gap: 15px;
          justify-content: center;
      }

      .showcase {
          flex: 1 1 calc(20% - 15px);
          box-sizing: border-box;
          margin-bottom: 15px;
          transition: transform 0.3s;
          max-width: 200px; /* Set a max width for consistency */
          height: 300px; /* Set a fixed height for consistency */
      }

      .showcase:hover {
          transform: scale(1.05);
      }

      .showcase-img-box {
          display: block;
          text-align: center;
          border: 1px solid #ddd;
          border-radius: 10px;
          overflow: hidden;
          background-color: #fff;
          box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
          transition: box-shadow 0.3s;
          height: 100%; /* Make the box take the full height */
      }

      .showcase-img-box:hover {
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      }

      .showcase-img {
          width: 100%;
          height: auto;
          max-height: 100%; /* Ensure the image does not exceed the box height */
      }

      .clearfix {
          width: 100%;
          flex-basis: 100%;
          height: 0;
      }

      .folder-title {
          width: 100%;
          flex-basis: 100%;
          font-size: 1.5em;
          margin-top: 20px;
          margin-bottom: 10px;
          color: #333;
          text-align: left;
          padding-left: 10px;
          background-color: #eee;
          border-radius: 10px;
          padding: 10px;
      }

      @media (max-width: 1024px) {
          .showcase {
              flex: 1 1 calc(33.33% - 15px); /* Adjust width for medium screens */
          }
      }

      @media (max-width: 768px) {
          .showcase {
              flex: 1 1 calc(50% - 15px); /* Adjust width for smaller screens */
          }
      }

      @media (max-width: 480px) {
          .showcase {
              flex: 1 1 calc(100% - 15px); /* Adjust width for even smaller screens */
          }
      }
  </style>


  <div class="overlay" data-overlay></div>

  <!-- MODAL -->

  <!-- HEADER -->
  <header>
    <?php require_once './includes/topheadactions.php'; ?>
    <?php require_once './includes/desktopnav.php' ?>
    <?php require_once './includes/mobilenav.php'; ?>
  </header>
</head>

<body>

<!-- MAIN -->
<main>

  <!-- CATEGORY: Bar -->
  <div class="category">
    <div class="container">
      <div class="category-item-container has-scrollbar">
        <?php while ($row = mysqli_fetch_assoc($category_bar_products)) { ?>
          <div class="category-item">
            <div class="category-img-box">
              <img src="./images/icons/<?php echo $row['category_img'] ?>" alt="category bar img" width="30" />
            </div>
            <div class="category-content-box">
              <div class="category-content-flex">
                <h3 class="category-item-title"><?php echo $row['category_title'] ?></h3>
                <p class="category-item-amount">(<?php echo $row['category_quantity'] ?>)</p>
                <form class="search-form" method="post" action="./search.php">
                    <select name="category" class="search-dropdown">
                        <option value="">Select Category</option>
                        <?php
                        $categories = get_image_categories(); // This function should fetch categories
                        foreach ($categories as $category) {
                            echo '<option value="' . $category . '">' . ucfirst($category) . '</option>';
                        }
                        ?>
                    </select>
                </form>



            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <!--
      - PRODUCT
    -->

  <div class="product-container">
    <div class="container">
      
      <!--
          - SIDEBAR
        -->


      <div class="product-box">
        <!--
            - PRODUCT MINIMAL
          -->

          <div class="product-showcase">
              <h2 class="title">New Arrivals</h2>
              <div class="showcase-wrapper has-scrollbar">
                  <div class="showcase-container">
                      <?php
                      foreach ($images_by_folder as $folder => $images) {
                          // Add an ID to the folder title for scrolling
                          echo "<h3 class='folder-title' id='folder-{$folder}'>{$folder}</h3>";
                          $count = 0; // Initialize a counter for each folder

                          foreach ($images as $image) {
                              $count++;
                      ?>
                              <div class="showcase">
                                  <a href="#" class="showcase-img-box">
                                      <img src="<?php echo $image; ?>" alt="New Arrival Image" class="showcase-img" />
                                  </a>
                              </div>
                      <?php
                              // After every 5 items, implement a break
                              if ($count % 5 == 0) {
                                  echo '<div class="clearfix"></div>';
                              }
                          }
                          // Add a break after the last image in each folder if not a multiple of 5
                          if ($count % 5 != 0) {
                              echo '<div class="clearfix"></div>';
                          }
                      }
                      ?>
                  </div>
              </div>
          </div>

  <script>
  // Scroll to the selected category section if it's set
  document.addEventListener('DOMContentLoaded', function() {
      var selectedCategory = '<?php echo $selected_category; ?>';
      if (selectedCategory) {
          var element = document.getElementById('folder-' + selectedCategory);
          if (element) {
              element.scrollIntoView({ behavior: 'smooth' });
          }
      }
  });
  </script>

</main>
</body>

</html>
