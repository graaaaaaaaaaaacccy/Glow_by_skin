<?php
include_once('./includes/headerNav.php');
include "includes/config.php";

function get_images_from_category($category) {
    global $conn; // Assuming $conn is your database connection
    $images = [];

    $query = "SELECT image_path FROM images WHERE image_path LIKE '%/$category/%'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $image_path = $row['image_path'];
            $image_url = str_replace('C:/xampp/htdocs', 'http://localhost', $image_path);
            $images[] = $image_url;
        }
        mysqli_free_result($result);
    } else {
        echo "Error retrieving images: " . mysqli_error($conn);
    }

    return $images;
}

?>

<div class="overlay" data-overlay></div>

<header>
  <?php require_once './includes/topheadactions.php'; ?>
  <?php require_once './includes/mobilenav.php'; ?>
</header>

<main>

  <div class="product-container">
    <div class="container">
      <?php require_once './includes/categorysidebar.php'; ?>

      <div class="product-box">
        <div class="product-main">

          <h2 class="title">
            Search: 
            <?php 
              if(isset($_POST['category'])) {
                echo $_POST['category'];
              }
            ?> 
          </h2>

          <div class="product-grid">
            <?php
            if(isset($_POST['submit']) && !empty($_POST['category'])) {
              $category = mysqli_real_escape_string($conn, $_POST['category']);

              if (isset($_GET['page'])) {
                $page = $_GET['page'];
              } else {
                $page = 1;
              }

              $limit = 8;
              $offset = ($page - 1) * $limit;

              $images = get_images_from_category($category);

              if (!empty($images)) {
                $count = 0;
                foreach ($images as $image) {
                  $count++;
                  ?>
                  <div class="showcase">
                    <a href="#" class="showcase-img-box">
                      <img src="<?php echo $image; ?>" alt="Image" class="showcase-img" />
                    </a>
                  </div>
                  <?php
                  if ($count % 5 == 0) {
                    echo '<div class="clearfix"></div>';
                  }
                }
              } else {
                echo "<h4 style='color:red; margin-left:8%;border:1px solid aliceblue'>"."No record found"."</h4>";
              }
            } else {
              echo "<h4 style='color:red; margin-left:8%;border:1px solid aliceblue'>"."Please select a category."."</h4>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="pag-cont-search">
    <?php
    include "includes/config.php";

    if (isset($_POST['submit']) && !empty($_POST['category'])) {
      $category = mysqli_real_escape_string($conn, $_POST['category']);
      $sql1 = "SELECT * FROM images WHERE image_path LIKE '%/$category/%'";
      $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

      if (mysqli_num_rows($result1) > 0) {
        $total_images = mysqli_num_rows($result1);
        $total_page = ceil($total_images / $limit);

        echo "<div class='pagination'>";

        for ($i = 1; $i <= $total_page; $i++) {
          if ($page == $i) {
            $active = "active";
          } else {
            $active = "";
          }

          echo "<a href='search.php?page={$i}&category={$category}' class='{$active}'>" . $i . "</a>";
        }

        echo "</div>";
      }
    }
    ?>
  </div>

</main>

<?php require_once './includes/footer.php'; ?>
